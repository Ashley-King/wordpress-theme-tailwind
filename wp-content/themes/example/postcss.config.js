const header = require('postcss-header');

module.exports = {
  plugins: [
    require('tailwindcss'),
    require('autoprefixer'),
    require('postcss-import'),
    require('cssnano')({
      preset: 'default',
    }),
    header({
      header: `/*Theme Name: Example
      Theme URI: https://giantly.co
      Author: Ashley K
      Author URI: https://giantly.co
      Description: A custom WordPress theme.
      Version: 1.0
      License: GNU General Public License v2 or later
      License URI: http://www.gnu.org/licenses/gpl-2.0.html
      Text Domain: example
*/`,
    }),
  ],
}
