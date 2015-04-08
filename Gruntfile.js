module.exports = function(grunt) {
    require('jit-grunt')(grunt);

    grunt.initConfig({
      package: grunt.file.readJSON('package.json'),
      paths: {
        sass: 'sass',
        css: 'css',
        root: '.',
        tmp: '.tmp',
        vendor: 'vendor',
      },
      sass: {
        dist: {
          options: {
            style: 'compressed',
            compass: true,
            sourcemap: 'none'
          },
          files: {
            '<%= paths.tmp %>/main.css': '<%= paths.sass %>/main.scss'
          }
        }
      },
      csssplit: {
        dist: {
          src: ['<%= paths.root %>/style.css'],
          dest: '<%= paths.root %>/css/split.css',
          options: {
              maxSelectors: 4095,
              maxPages: 3,
              suffix: '-part-'
          }
        }
      },
      cssmin: {
        target: {
          files: [
            {
              expand: true,
              cwd: '<%= paths.root %>/css',
              src: ['split-part-1.css'],
              dest: 'css'
            },
            {
              expand: true,
              cwd: '<%= paths.root %>/css',
              src: ['split-part-2.css'],
              dest: 'css'
            }
          ]
        }
      },
      template: {
        dist: {
          options: {
            data: {
              VERSION: '<%= package.version %>'
            }
          },
          files: {
            '<%= paths.root %>/style.css': ['<%= paths.tmp %>/main.css']
          }
        }
      },
      update_json: {
        options: {
          indent: '\t'
        },
        bower: {
          src: 'package.json',
          dest: 'bower.json',
          fields: {
            name: 'name',
            version: 'version',
            authors: 'authors',
            description: 'description',
            repository: 'repository',
            license: 'license'
          }
        }
      },
      watch: {
        sass: {
          files: ['<%= paths.sass %>/**/*.{scss,sass}'],
          tasks: ['styles']
        },
        version: {
          files: [
            '<%= paths.root %>/package.json',
            '<%= paths.tmp %>/main.css'
          ],
          tasks: ['template', 'update_json']
        }
      }
    });

    grunt.registerTask('styles', ['sass', 'csssplit', 'cssmin']);

    // Builds the theme
    grunt.registerTask('build', ['styles', 'template', 'update_json']);

    // Default task
    grunt.registerTask('default', ['build', 'watch']);
};
