/**
 * File name: Gruntfile.js
 * Description: Build tool
 * Author: den.isahac
 * Author URI: https://github.com/denisahac
 *
 */

module.exports = function(grunt) {
   require("load-grunt-tasks")(grunt); // npm install --save-dev load-grunt-tasks

  // Initialize configuration
  grunt.initConfig({
      pkg: grunt.file.readJSON('package.json'),
      
      // Syntactically Awesome Stylesheets
      // https://github.com/gruntjs/grunt-contrib-sass
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
      // https://www.npmjs.com/package/grunt-autoprefixer
      autoprefixer: {
          css: {
              src: 'library/css/*.css'
          }
      },

      babel: {
        options: {
          sourceMap: true
        },
        dist: {
          files: {
            // 'dist': 'source'
          }
        }
      },
      
      // Javascript linter
      // https://www.npmjs.com/package/grunt-contrib-jshint
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
      // https://www.npmjs.com/package/grunt-contrib-uglify
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
      // https://www.npmjs.com/package/grunt-contrib-watch
      watch: {
          // Grunt
          grunt: {
              options: {
                  reload: true
              },
              files: ['Gruntfile.js'],
              tasks: ['newer:jshint:grunt']
          },
          // Syntactically Awesome Stylesheets
          sass: {
              files: 'library/scss/**/*.scss',
              tasks: ['newer:sass', 'newer:autoprefixer']
          },
          // Library scripts
          scripts: {
              files: ['library/js/app.js'],
              tasks: ['newer:jshint:scripts']
          }
      },
      
      // Image minifier
      // https://github.com/1000ch/grunt-image
      image: {
        options: {
          pngquant: true,
          optipng: true,
          zopflipng: true,
          jpegRecompress: false,
          jpegoptim: true,
          mozjpeg: true,
          gifsicle: true,
          svgo: true
        },

        uploads: {                         // wp-content/uploads
          files: [{
            expand: true,                  // Enable dynamic expansion
            cwd: '../../uploads',          // src matches are relative to this path
            src: ['**/*.{png,jpg,gif,svg}'],   // Actual patterns to match
            dest: '../../uploads.min'      // Destination path prefix
          }]
        },

        images: {                          // theme images
          files: [{
            expand: true,                  // Enable dynamic expansion
            cwd: 'library/images',         // src matches are relative to this path
            src: ['**/*.{png,jpg,gif,svg}'],   // Actual patterns to match
            dest: 'library/images.min'     // Destination path prefix
          }]
        }
      },
      
      // Browser Sync
      // https://www.browsersync.io/docs/grunt/
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

      // Generate POT file
      // https://www.npmjs.com/package/grunt-pot
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
      },

      // Convert .po file to .mo file
      // https://github.com/axisthemes/grunt-potomo
      potomo: {
       i18n: {
         files: [{
           expand: true,
           cwd: 'library/translations',
           src: ['*.po'],
           dest: 'library/translations',
           ext: '.mo',
           nonull: true
         }]
       }
     }      
  });
  
  // Register task(s)
  grunt.registerTask('build', [
      'newer:sass',
      'newer:autoprefixer',
      'newer:jshint',
      'newer:potomo',
      'browserSync',
      'watch'
  ]);                                                   // Run this task with 'grunt build' command
  
  grunt.registerTask('deploy', [
      'newer:sass',
      'newer:autoprefixer',
      'newer:jshint',
      'newer:uglify',
      'newer:potomo',
      'newer:imagemin'
  ]);                                                   // Run this task on deployment with 'grunt deploy' command
  
  grunt.registerTask('translate', 'pot');               // Run this task to generate a new .pot file
  
  grunt.registerTask('default', 'build');               // Default task 
};