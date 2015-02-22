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
          tasks: ['sass']
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

    // Builds the theme
    grunt.registerTask('build', ['sass', 'template', 'update_json']);

    // Default task
    grunt.registerTask('default', ['build', 'watch']);
};
