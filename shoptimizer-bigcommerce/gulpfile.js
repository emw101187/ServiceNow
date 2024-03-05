/** @format */

const gulp = require( 'gulp' );

gulp.task( 'fix-css', function fixCssTask() {
	const gulpStylelint = require( 'gulp-stylelint' );

	var paths = [
		'assets/css/**/*.css',
		'style.css'
	];

	return gulp

		//.src( 'assets/css/**/*.css' )
		.src( paths, {base: './'} )

		.pipe(
			gulpStylelint( {
				failAfterError: false,
				fix: true
			} )
		)
		.pipe( gulp.dest( './' ) );

} );


var penthouse = require( 'penthouse' );
var fs = require( 'fs' );
var rename = require( 'gulp-rename' );

var urlList = require( './criticalcss-pagelist.json' );
gulp.task( 'getcriticalcss', function() {
	urlList.urls.forEach( function( item, i ) {
		penthouse( {
			url: item.link,
			css: 'assets/css/main/main.css',
			width: 1300,  // viewport width
			height: 900,  // viewport height
			propertiesToRemove: [
				'(.*)transition(.*)',
				'cursor',
				'pointer-events',
				'(-webkit-)?tap-highlight-color',
				'(.*)user-select'
			]
		} )
		.then( criticalCss => {

			// use the critical css
			fs.writeFileSync( 'assets/css/' + item.name + '.php', criticalCss );
		} );

	} );
} );

var cssnano = require( 'gulp-cssnano' );

gulp.task( 'cssminify', function() {
    return gulp.src( 'assets/css/main/main.css' )
        .pipe( cssnano() )
        .pipe( rename( { suffix: '.min' } ) )
        .pipe( gulp.dest( 'assets/css/main/' ) );
} );
