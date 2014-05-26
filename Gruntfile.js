'use strict';
module.exports = function (grunt) {

    grunt.initConfig({

        devUpdate: {
            main: {
                options: {
                    updateType: 'report', //just report outdated packages
                    reportUpdated: false, //don't report already updated packages
                    semver: true, //use package.json semver rules when updating
                    packages: { //what packages to check
                        devDependencies: true, //only devDependencies
                        dependencies: false
                    },
                    packageJson: null //find package.json automatically
                }
            }
        },

        jshint: {
            options: {
                jshintrc: '.jshintrc'
            },
            all: [
                'Gruntfile.js',
                'js/*.js',
                '!js/lib/*.js',
                '!js/plugins/*.js',
                '!js/app.min.js'
            ]
        },

        less: {
            dist: {
                files: {
                    'css/main.min.css': [
                        'less/main.less'
                    ]
                },
                options: {
                    compress: true,
                }
            }
        },

        uglify: {
            dist: {
                files: {
                    'js/app.min.js': [
                        'js/plugins/*.js',
                        'js/app.js',
                        '!js/app.min.js'
                    ]
                },
                options: {}
            }
        },

        watch: {
            less: {
                files: [
                    'less/*.less'
                ],
                tasks: ['less']
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
        },

        clean: {
            dist: [
                'css/main.min.css',
                'js/app.min.js'
            ]
        }
    });

    // Load tasks
    grunt.loadNpmTasks('grunt-contrib-clean');
    grunt.loadNpmTasks('grunt-contrib-jshint');
    grunt.loadNpmTasks('grunt-contrib-uglify');
    grunt.loadNpmTasks('grunt-contrib-watch');
    grunt.loadNpmTasks('grunt-contrib-less');
    grunt.loadNpmTasks('grunt-notify');
    grunt.loadNpmTasks('grunt-dev-update');

    // Register tasks
    grunt.registerTask('default', [
        'clean',
        'less',
        'uglify'
    ]);


    grunt.registerTask('dev', [
        'watch'
    ]);

};