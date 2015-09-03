module.exports = function( grunt ) {

	grunt.initConfig( {
		pkg: grunt.file.readJSON( 'package.json' ),
		uglify: {
			all: {
				files: {
					"assets/js/min/calais.min.js": [ "assets/js/src/calais.js" ]
				}
			},
			options: {
				compress: {
					drop_console: true
				}
			}
		},
		sass: {
			all: {
				files: {
					"assets/css/min/calais.min.css": [ "assets/css/sass/calais.scss" ]
				}
			}
		},
		compass: {
			debug: {
				options: {
					sassDir: "assets/css/sass",
					cssDir: "assets/css/src",
					outputStyle: "expanded",
					noLineComments: false
				}
			},
			min: {
				options: {
					sassDir: "assets/css/sass",
					cssDir: "assets/css/min",
					outputStyle: "compressed",
					noLineComments: true
				}
			}
		},
		watch: {
			compass: {
				files: [
					"assets/css/sass/*.scss",
					"assets/css/sass/partials/*.scss"
				],
				tasks: [
					"compass:debug",
					"compas:min",
				],
				options: {
					debounceDelay: 500
				}
			},
			scripts: {
				files: [ 'assets/js/src/**/*.js' ],
				tasks: [ 'concat', 'uglify' ],
				options: {
					debounceDelay: 500
				}
			}
		},
		concat: {
			options: {
				stripBanners: true
			},
			dist: {
				src: [
					'assets/js/src/calais.js'
				],
				dest: 'assets/js/debug/calais.js'
			}
		},
	} );

	grunt.loadNpmTasks( 'grunt-contrib-concat' );
	grunt.loadNpmTasks( 'grunt-contrib-uglify' );
	grunt.loadNpmTasks( 'grunt-contrib-compass' );
	grunt.loadNpmTasks( 'grunt-contrib-watch' );
	grunt.loadNpmTasks( 'grunt-contrib-clean' );

	grunt.registerTask( 'default', ['concat', 'uglify', 'compass'] );
	grunt.registerTask( 'build', ['default', 'clean'] );
	grunt.util.linefeed = '\n';

}