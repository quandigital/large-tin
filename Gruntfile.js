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

        uglify: {
            dist: {
                options: {
                    mangle: {
                        toplevel: false
                    },
                    compress: {
                        drop_console: true
                    },
                    report: 'min',
                    preserveComments: false
                },
                files: [
                    {
                        expand: true,     // Enable dynamic expansion.
                        cwd: 'js',      // Src matches are relative to this path.
                        src: '*.js', // Actual pattern(s) to match.
                        dest: 'js/min',   // Destination path prefix.
                        ext: '.js',   // Dest filepaths will have this extension.
                        extDot: 'last',   // Extensions in filenames begin after the first dot
                    }
                ]
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
    grunt.loadNpmTasks('grunt-contrib-uglify');
    grunt.loadNpmTasks('grunt-contrib-watch');

    grunt.registerTask('build', ['sass', 'uglify:dist']);
    grunt.registerTask('default', ['sass', 'watch']);
}
