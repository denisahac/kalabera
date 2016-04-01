/**
 * File name: Gruntfile.js
 * Description: Build tool
 * Author: den.isahac <den.isahac@gmail.com>
 * Author URI: https://github.com/denisahac
 *
 */

module.exports = function(grunt) {
  // Initialize configuration
  grunt.initConfig({
      pkg: grunt.file.readJSON('package.json'),
      
      // Syntactically Awesome Stylesheets
      sass: {
          options: {
              // loadPath: ['THE_SASS_FOLDER'],
              noCache: true
          },
          dist: {
              options: {
                  style: 'compressed'
              },
              files: {
                  // 'THE_CSS': 'THE_SASS',
              }
          }
      },
      
      // CSS3 autoprefixer
      autoprefixer: {
          css: {
              src: 'library/css/*.css'
          }
      },
      
      // Javascript linter
      jshint: {
          // Grunt
          grunt: {
              files: {
                  src: ['Gruntfile.js']
              }
          },
          // Library scripts
          scripts: {
              options: {
                ignores: ['library/js/*.min.js', 'library/js/libs/*.js']
              },
              files: {
                  src: ['library/js/*.js']
              }
          }
      },

      // Javascript minifier
      uglify: {
      scripts: {
        options: {
          sourceMap: true
        },
        files: {
          // 'THE_MIN_JS': ['THE_JS_FILE']
        }
      }
    },
      
      // File watcher
      watch: {
          // Grunt
          grunt: {
              options: {
                  reload: true
              },
              files: ['Gruntfile.js'],
              tasks: ['jshint:grunt']
          },
          // Syntactically Awesome Stylesheets
          sass: {
              files: 'library/scss/**/*.scss',
              tasks: ['sass', 'autoprefixer']
          },
          // Library scripts
          scripts: {
              files: ['library/js/app.js'],
              tasks: ['jshint:scripts']
          }
      },
      
      // Image minifier
      imagemin: {
        options: {
          optimizationLevel: 7    
        },

        images: {                          // Another target 
          files: [{
            expand: true,                  // Enable dynamic expansion 
            cwd: 'library/images',         // src matches are relative to this path 
            src: ['**/*.{png,jpg,gif}'],   // Actual patterns to match 
            dest: 'library/images'         // Destination path prefix 
          }]
        }
      },
      
      // Browser Sycn
      browserSync: {
          dev: {
              options: {
                  watchTask: true,
                  // proxy: 'THE_HOST'
              },
              bsFiles: {
                  src: [
                      // CSS
                      'library/css/*.css',

                      // Javascript
                      'library/js/*.js',
                      
                      // Translation
                      'library/translations/*.mo',
                      
                      // PHP
                      '*.php',
                      '**/*.php'
                  ]
              }
          }
      },

      // Generate POT files
      pot: {
        options:{
          text_domain: 'kalabera', // Your text domain. Produces my-text-domain.pot
          dest: 'library/translations/', // directory to place the pot file
          keywords: ['gettext', '__', '_e'], // functions to look for
        },
        files:{
          src:  [ '**/*.php' ], // Parse all php files
          expand: true,
       }
      }
      
  });
  
  // Load plugin(s)
  grunt.loadNpmTasks('grunt-contrib-sass');       // SASS to CSS converter
  grunt.loadNpmTasks('grunt-autoprefixer');             // CSS3 autoprefixer
  grunt.loadNpmTasks('grunt-contrib-jshint');           // Javascript linter
  grunt.loadNpmTasks('grunt-contrib-uglify');     // Javascript minifier
  grunt.loadNpmTasks('grunt-contrib-watch');            // File watcher
  grunt.loadNpmTasks('grunt-contrib-imagemin');         // Image minifier
  grunt.loadNpmTasks('grunt-browser-sync');             // Browsing testing synchronization
  grunt.loadNpmTasks('grunt-pot');                      // Internationalization
  
  // Register task(s)
  grunt.registerTask('build', [
      'sass',
      'autoprefixer',
      'jshint',
      'browserSync',
      'watch'
  ]);                                                   // Run this task with 'grunt build' command
  
  grunt.registerTask('deploy', [
      'sass',
      'autoprefixer',
      'jshint',
      'uglify',
      'imagemin'
  ]);                                                   // Run this task on deployment with 'grunt deploy' command
  
  grunt.registerTask('translate', 'pot');               // Run this task to generate a new .pot file
  
  grunt.registerTask('default', 'build');               // Default task 
};