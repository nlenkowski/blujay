'use strict';
module.exports = function (grunt) {

    require('time-grunt')(grunt);

    grunt.initConfig({

        sass: {
            all: {
                options: {
                    sourceMap: false,
                    outputStyle: 'compressed'
                },
                files: {
                    'assets/css/main.min.css': 'assets/sass/main.scss'
                }
            }
        },

        autoprefixer: {
            all: {
                options: {
                    browsers: ['last 2 versions', 'ie 8', 'ie 9']
                },
                files: {
                    'assets/css/main.min.css': 'assets/css/main.min.css'
                }
            }
        },

        jshint: {
            all: [
                'Gruntfile.js',
                'assets/js/*.js',
                '!assets/js/lib/*.js',
                '!assets/js/plugins/*.js',
                '!assets/js/app.min.js'
                ],
                options: {
                    jshintrc: '.jshintrc'
                }
        },

        uglify: {
            all: {
                files: {
                    'assets/js/app.min.js': [
                        'assets/js/plugins/*.js',
                        'assets/js/app.js',
                        '!assets/js/app.min.js'
                    ]
                }
            }
        },

        watch: {

            sass: {
                files: ['assets/sass/*.scss'],
                tasks: ['sass', 'autoprefixer']
            },

            js: {
                files: [
                    '<%= jshint.all %>'
                ],
                tasks: ['jshint', 'uglify']
            },

            livereload: {
                options: {
                    livereload: true
                },
                files: [
                    'assets/css/main.min.css',
                    'assets/js/app.min.js',
                    'templates/*.php',
                    '*.php'
                ]
            }
        }
    });

    // Load tasks
    require('load-grunt-tasks')(grunt);

    // Register tasks
    grunt.registerTask('default', [
        'sass',
        'autoprefixer',
        'uglify'
    ]);

    grunt.registerTask('dev', [
        'watch'
    ]);

};