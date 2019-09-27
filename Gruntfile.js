module.exports = function(grunt) {

  require('jit-grunt')(grunt);

  grunt.initConfig({

	pkg: grunt.file.readJSON('package.json'),

	assets: {
		base: 'assets/portal/concat',
		js: 'assets/portal/js',
		app: 'assets/portal/app',
		css: 'assets/portal/css',
		img: 'assets/portal/img'
	},

	concat: {
		js: {
			files: {
				'<%= assets.base %>/scripts.js': [
					'<%= assets.js %>/wysihtml5-0.3.0.js',
					'<%= assets.js %>/jquery-1.11.3.min.js',
					'<%= assets.js %>/jquery-ui-1.10.3.minimal.min.js',
					'<%= assets.js %>/jquery.multi-select.js',
					'<%= assets.js %>/jquery.peity.min.js',
					'<%= assets.js %>/jquery.mCustomScrollbar.concat.min.js',
					'<%= assets.js %>/jquery.validate.min.js',
					'<%= assets.js %>/jquery.dataTables.min.js',
					'<%= assets.js %>/jquery.emojipicker.js',
					'<%= assets.js %>/jquery.emojis.js',
					'<%= assets.js %>/config.js',
					'<%= assets.js %>/util.js',
					'<%= assets.js %>/jquery.emojiarea.js',
					'<%= assets.js %>/emoji-picker.js',
					'<%= assets.js %>/perfect-scrollbar.jquery.min.js',
					'<%= assets.js %>/additional-methods.min.js',
					'<%= assets.js %>/validation-pt-br.js',
					'<%= assets.js %>/jquery.selectBoxIt.min.js',
					'<%= assets.js %>/ckeditor.js',
					'<%= assets.js %>/moment.min.js',
					'<%= assets.js %>/moment-pt-br.js',
					'<%= assets.js %>/bootstrap.js',
					'<%= assets.js %>/bootstrap-tagsinput.min.js',
					'<%= assets.js %>/bootstrap-datepicker.js',
					'<%= assets.js %>/bootstrap-datepicker.pt-BR.js',
					'<%= assets.js %>/bootstrap-colorpicker.min.js',
					'<%= assets.js %>/bootstrap-wysihtml5.js',
					'<%= assets.js %>/tinycolor-min.js',
					'<%= assets.js %>/TweenMax.min.js',
					'<%= assets.js %>/typeahead.bundle.js',
					'<%= assets.js %>/typeahead.tagging.js',
					'<%= assets.js %>/select2.min.js',
					'<%= assets.js %>/d3.v3.min.js',
					'<%= assets.js %>/c3.min.js',
					'<%= assets.js %>/resizeable.js',
					'<%= assets.js %>/neon-api.js',
					'<%= assets.js %>/neon-custom.js',
					'<%= assets.js %>/angular.min.js',
					'<%= assets.js %>/angular-route.min.js',
					'<%= assets.js %>/angular-sanitize.min.js',
					'<%= assets.js %>/angular-resource.min.js',
					'<%= assets.js %>/angular-linkify.min.js',
					'<%= assets.js %>/angular-moment.min.js',
					'<%= assets.js %>/angular-translate.min.js',
					'<%= assets.js %>/scrollglue.js'
				],
				'<%= assets.base %>/login.js': [
					'<%= assets.js %>/jquery-1.11.3.min.js',
					'<%= assets.js %>/jquery-ui-1.10.3.minimal.min.js',
					'<%= assets.js %>/jquery.validate.min.js',
					'<%= assets.js %>/additional-methods.min.js',
					'<%= assets.js %>/pt-br.js',
					'<%= assets.js %>/bootstrap.js',
					'<%= assets.js %>/TweenMax.min.js',
					'<%= assets.js %>/resizeable.js',
					'<%= assets.js %>/resizeable.js',
					'<%= assets.js %>/neon-api.js',
					'<%= assets.js %>/neon-login.js',
					'<%= assets.js %>/neon-register.js',
					'<%= assets.js %>/neon-custom.js',
                    '<%= assets.js %>/angular.min.js',
                    '<%= assets.js %>/angular-sanitize.min.js',
                    '<%= assets.js %>/angular-translate.min.js',
				],
				'<%= assets.base %>/app.js': [
					'<%= assets.app %>/app.js',
					'<%= assets.app %>/models/services.js',
					'<%= assets.app %>/controllers/*.js'
				]
			}
		},
		css: {
			files: {
				'<%= assets.base %>/styles.css': [
					'<%= assets.css %>/*.css',
					'!<%= assets.css %>/login.css',
					'!<%= assets.css %>/styles.css',
					'!<%= assets.css %>/wcustom-login.css'
				],
				'<%= assets.base %>/login.css': [
					'<%= assets.css %>/bootstrap.css',
					'<%= assets.css %>/fontello.css',
					'<%= assets.css %>/roboto.css',
					'<%= assets.css %>/jquery-ui-1.10.3.custom.min.css',
					'<%= assets.css %>/neon-core.css',
					'<%= assets.css %>/neon-theme.css',
					'<%= assets.css %>/wcustom-login.css'
				]
			}
		}
	},

	cssmin: {
		options: {
        	keepSpecialComments: 0
    	},
		target: {
			files: {
				'<%= assets.base %>/styles.css' : ['<%= assets.base %>/styles.css'],
				'<%= assets.base %>/login.css' : ['<%= assets.base %>/login.css']
			}
		}
	},

	uglify: {
		js: {
			files: {
				'<%= assets.base %>/scripts.js' : ['<%= assets.base %>/scripts.js'],
				'<%= assets.base %>/login.js' : ['<%= assets.base %>/login.js'],
				'<%= assets.base %>/app.js' : ['<%= assets.base %>/app.js']
			}
		}
	},

	watch: {
		options: {
			spawn: false,
			livereload: true
		},
		js: {
			files: [
				"<%= assets.js %>/**/*.js",
				"<%= assets.js %>/**/**/*.js"
			],
			tasks: ['concat:js']
		},
		css: {
			files: [
				"<%= assets.css %>/**/*.css",
				"<%= assets.css %>/**/**/**/*.css"
			],
			tasks: ['concat:css']
		}
	}

  });

	grunt.registerTask('default', ['concat:js', 'concat:css']);
	//grunt.registerTask('default', ['concat:js', 'concat:css', 'uglify']);
	grunt.registerTask('w', ['default', 'watch']);
};
