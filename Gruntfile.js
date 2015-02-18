'use strict';
module.exports = function (grunt) {

    grunt.initConfig({

        sass: {
            all: {
                options: {
                    style: 'compressed',
                    cacheLocation: 'tmp/.sass-cache'
                },
                files: {
                    'css/main.min.css': 'sass/main.scss'
                }
            }
        },

        autoprefixer: {
            all: {
                options: {
                    browsers: ['last 2 versions', 'ie 8', 'ie 9']
                },
                files: {
                    'css/main.min.css': 'css/main.min.css'
                }
            }
        },

        jshint: {
            all: [
                'Gruntfile.js',
                'js/*.js',
                '!js/lib/*.js',
                '!js/plugins/*.js',
                '!js/app.min.js'
                ],
                options: {
                    jshintrc: '.jshintrc'
                }
        },

        uglify: {
            all: {
                files: {
                    'js/app.min.js': [
                        'js/plugins/*.js',
                        'js/app.js',
                        '!js/app.min.js'
                    ]
                }
            }
        },

        watch: {

            sass: {
                files: ['sass/*.scss'],
                tasks: ['sass', 'autoprefixer'],
                options: {
                    debounceDelay: 500
                }
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
                    'css/main.min.css',
                    'js/app.min.js',
                    'templates/*.php',
                    '*.php'
                ]
            }
        }
    });

    // Load tasks
    grunt.loadNpmTasks('grunt-contrib-jshint');
    grunt.loadNpmTasks('grunt-contrib-uglify');
    grunt.loadNpmTasks('grunt-contrib-watch');
    grunt.loadNpmTasks('grunt-contrib-sass');
    grunt.loadNpmTasks('grunt-autoprefixer');
    grunt.loadNpmTasks('grunt-notify');

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