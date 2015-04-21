module.exports = function(grunt) {
    grunt.initConfig({
        pkg: grunt.file.readJSON('package.json'),

        sass: {
            default: {
                options: {
                    outputStyle: 'compressed',
                    includePaths: require('node-bourbon').includePaths,
                    sourceMap: true
                },
                files: {
                    'css/app.css': 'scss/app.scss'
                }        
            }
        },

        watch: {
            grunt: { 
                files: 'Gruntfile.js',
                tasks: 'sass'
            },

            sass: {
                files: 'scss/**/*.scss',
                tasks: 'sass'
            }
        }
    });

    grunt.loadNpmTasks('grunt-sass');
    grunt.loadNpmTasks('grunt-contrib-watch');

    grunt.registerTask('build', 'sass');
    grunt.registerTask('default', ['sass', 'watch']);
}
