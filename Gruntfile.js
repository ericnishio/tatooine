module.exports = function(grunt) {
    require('jit-grunt')(grunt);

    grunt.initConfig({
      package: grunt.file.readJSON('package.json'),
      paths: {
        sass: 'sass',
        css: 'css',
        root: '.',
        vendor: 'vendor',
      },
      sass: {
        dist: {
          options: {
            style: 'expanded',
            compass: true,
            sourcemap: 'none'
          },
          files: {
            '<%= paths.css %>/main.css': '<%= paths.sass %>/main.sass'
          }
        }
      },
      template: {
        dist: {
          options: {
            data: {
              VERSION: '<%= package.version %>',
            }
          },
          files: {
            '<%= paths.root %>/style.css': ['<%= paths.root %>/style.src.css']
          }
        }
      },
      watch: {
        sass: {
          files: ['<%= paths.sass %>/**/*.{scss,sass,css}'],
          tasks: ['sass']
        },
        'style.css': {
          files: [
            '<%= paths.root %>/package.json',
            '<%= paths.root %>/style.src.css',
            '<%= paths.root %>/style.css'
          ],
          tasks: ['template']
        }
      }
    });

    // Builds the theme
    grunt.registerTask('build', ['sass', 'template']);

    // Default task
    grunt.registerTask('default', ['build', 'watch']);
};
