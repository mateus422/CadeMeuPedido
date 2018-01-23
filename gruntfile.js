module.exports = function(grunt) {
    "use strict";

    grunt.initConfig({
        imagemin: { 
            public: {
                expand: true,
                cwd: 'src/assets/_images/',
                src: '*.{png,jpg,gif}',
                dest: 'src/assets/_images/_imagemin/'
            }
        },
        connect: { 
            server: { 
                options: {
                    port: 9002,
                    hostname: '*',
                    base: "src/"
                }
            }
        },
        compass: {
            dist: {
                options: { 
                    sassDir: 'src/assets/_sass/',
                    cssDir: 'src/assets/_css',
                    environment: 'production'
                }
            }
        },
        watch:{
            css:{
                files: "**/*.scss",
                tasks: ['compass'],
                options: {
                    livereload: true
                }
            }
        }
    });

    grunt.loadNpmTasks('grunt-contrib-connect');
    grunt.loadNpmTasks('grunt-contrib-compass');
    grunt.loadNpmTasks('grunt-contrib-watch');
    grunt.loadNpmTasks('grunt-contrib-imagemin');

    grunt.registerTask("default", []);
    grunt.registerTask("server", ["imagemin","compass","connect","watch"]);
}