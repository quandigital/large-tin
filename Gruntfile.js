module.exports = function(grunt) {
    grunt.initConfig({
        pkg: grunt.file.readJSON('package.json'),

        sass: {
            dist: {
                options: {
                    outputStyle: 'compressed',
                    includePaths: require('node-bourbon').includePaths
                },
                files: {
                    'css/app.css': 'scss/app.scss'
                }        
            },
            dev: {
                options: {
                    outputStyle: 'expanded',
                    includePaths: require('node-bourbon').includePaths
                },
                files: {
                    'css/app.css': 'scss/app.scss'
                }
            }
        },

        watch: {
            grunt: { 
                files: 'Gruntfile.js',
                tasks: ['sass:dev']
            },

            sass: {
                files: 'scss/**/*.scss',
                tasks: 'sass:dev'
            }
        }
    });

    grunt.loadNpmTasks('grunt-sass');
    grunt.loadNpmTasks('grunt-contrib-watch');

    grunt.registerTask('build', ['sass:dist']);
    grunt.registerTask('default', ['sass:dev', 'watch']);
}
