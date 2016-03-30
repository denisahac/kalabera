module.exports = function(grunt) {
  // Initialize configuration
  grunt.initConfig({
      pkg: grunt.file.readJSON('package.json'),
      
      // Syntactically Awesome Stylesheets
      sass: {
          options: {
              loadPath: ['library/bower_components/foundation-sites/scss',
                'library/bower_components/motion-ui',
                'library/bower_components/font-awesome/scss',
                'library/bower_components/slick-carousel/slick'],
              noCache: true
          },
          dist: {
              options: {
                  style: 'compressed'
              },
              files: {
                  'library/css/app.css': 'library/scss/app.scss',
                  'library/css/login.css': 'library/scss/login.scss',
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
              files: {
                  src: ['library/js/app.js']
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
          'library/js/app.min.js': [
              // Modernizr ↓
              'library/js/libs/modernizr.custom.min.js',
              // Smooth scroll ↓
              'library/js/libs/smoothscroll.min.js',
              // Console message ↓ 
              'library/bower_components/console.message/console.message.min.js',
              // Foundaton v6 ↓
              'library/bower_components/foundation-sites/js/foundation.core.js', // Core
              'library/bower_components/foundation-sites/js/foundation.util.triggers.js', // Util triggers
              'library/bower_components/foundation-sites/js/foundation.util.box.js', // Util box
              'library/bower_components/foundation-sites/js/foundation.util.keyboard.js', // Util keyboard
              'library/bower_components/foundation-sites/js/foundation.util.nest.js', // Util nest
              'library/bower_components/foundation-sites/js/foundation.util.mediaQuery.js', // Util media query
              'library/bower_components/foundation-sites/js/foundation.dropdownMenu.js', // Dropdown menu
              'library/bower_components/motion-ui/dist/motion-ui.min.js', // Motion UI
              'library/bower_components/foundation-sites/js/foundation.responsiveToggle.js', // Responsive toggle
              // Images loaded ↓
              'library/bower_components/imagesLoaded/imagesloaded.pkgd.min.js',
              // Slick carousel ↓
              'library/bower_components/slick-carousel/slick/slick.min.js',
              // App ↓
              'library/js/app.js',
              // jQuery form ↓
              'library/bower_components/jquery.form/index.js',
              // Contact form 7 ↓
              'library/js/wpcf7.js'

              ],
          'library/js/login.min.js': [
              // Console message ↓ 
              'library/bower_components/console.message/console.message.min.js',
              'library/js/login.js']
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
        uploads: {                         // Another target 
          files: [{
            expand: true,                  // Enable dynamic expansion 
            cwd: '../../uploads',                   // Src matches are relative to this path 
            src: ['**/*.{png,jpg,gif}'],   // Actual patterns to match 
            dest: '../../uploads.min'                  // Destination path prefix 
          }]
        },

        images: {                         // Another target 
          files: [{
            expand: true,                  // Enable dynamic expansion 
            cwd: 'library/images',                   // Src matches are relative to this path 
            src: ['**/*.{png,jpg,gif}'],   // Actual patterns to match 
            dest: 'library/images.min'                  // Destination path prefix 
          }]
        }
      },
      
      // Browser Sycn
      browserSync: {
          dev: {
              options: {
                  watchTask: true,
                  proxy: 'http://localhost/kizome/'
              },
              bsFiles: {
                  src: [
                      'library/css/*.css',          // CSS
                      'library/js/*.js',            // Javascripts
                      
                      // Translation
                      'library/lang/*.mo',
                      
                      'library/*.php',              // PHP files under library folder
                      'post-formats/*.php',         // Post formats
                      '*.php',                      // PHP 
                      '**/*.php'
                  ]
              }
          }
      },

      // Generate POT files
      pot: {
        options:{
          text_domain: 'kyoto', //Your text domain. Produces my-text-domain.pot
          dest: 'library/lang/', //directory to place the pot file
          keywords: ['gettext', '__', '_e'], //functions to look for
        },
        files:{
          src:  [ '**/*.php' ], //Parse all php files
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
      //'imagemin'
  ]);                                                   // Run this task on deployment with 'grunt deploy' command
  
  grunt.registerTask('translate', 'pot');               // Run this task to generate a new .pot file
  
  grunt.registerTask('default', 'build');               // Default task 
};