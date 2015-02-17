module.exports = function(grunt) {
    require('jit-grunt')(grunt);

    grunt.initConfig({
        pkg: grunt.file.readJSON('package.json'),
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
        watch: {
            sass: {
                files: ['<%= paths.sass %>/**/*.{scss,sass,css}'],
                tasks: ['sass']
            }
        }
    });

    // Builds the theme
    grunt.registerTask('build', ['sass']);

    // Default task
    grunt.registerTask('default', ['build', 'watch']);
};
