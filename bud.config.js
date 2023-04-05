/**
 * Build configuration
 *
 * @see {@link https://roots.io/docs/sage/ sage documentation}
 * @see {@link https://bud.js.org/guides/configure/ bud.js configuration guide}
 *
 * @typedef {import('@roots/bud').Bud} Bud
 * @param {Bud} app
 */
import purgeCssWordPress from 'purgecss-with-wordpress';

export default async (app) => {
  /**
   * Application entrypoints
   * @see {@link https://bud.js.org/docs/bud.entry/}
   */
  app
    /**
       * Treat bootstrap as source modules
       */
    .compilePaths([
      app.path(`resources`),
      app.path(`node_modules/bootstrap`),
    ])

    .entry({
      app: ['@styles/_bootstrap.scss', '@scripts/app', '@styles/app.scss'],
      editor: ['@scripts/editor', '@styles/editor'],
    })

    .purgecss({
      content: [app.path(`resources/views/**`)],
      safelist: [...purgeCssWordPress.safelist],
    })

    /**
     * Directory contents to be included in the compilation
     * @see {@link https://bud.js.org/docs/bud.assets/}
     */
    .assets(['images'])

    /**
     * Matched files trigger a page reload when modified
     * @see {@link https://bud.js.org/docs/bud.watch/}
     */
    // .watch(['resources/views', 'resources/styles', 'app'])
    .watch('resources/views/**/*', 'app/**/*')

    /**
     * Proxy origin (`WP_HOME`)
     * @see {@link https://bud.js.org/docs/bud.proxy/}
     */
    .proxy('https://hill-hear-better.local')

    /**
     * Development origin
     * @see {@link https://bud.js.org/docs/bud.serve/}
     */
    .serve('http://localhost:3007')

    /**
     * URI of the `public` directory
     * @see {@link https://bud.js.org/docs/bud.setPublicPath/}
     */
    .setPublicPath('/wp-content/themes/hill-hear-better/public/')

    /**
     * Generate WordPress `theme.json`
     *
     * @note This overwrites `theme.json` on every build.
     *
     * @see {@link https://bud.js.org/extensions/sage/theme.json/}
     * @see {@link https://developer.wordpress.org/block-editor/how-to-guides/themes/theme-json/}
     */
    .wpjson.settings({
      color: {
        custom: false,
        customDuotone: false,
        customGradient: false,
        defaultDuotone: false,
        defaultGradients: false,
        defaultPalette: false,
        duotone: [],
      },
      custom: {
        spacing: {},
        typography: {
          'font-size': {},
          'line-height': {},
        },
      },
      spacing: {
        padding: true,
        units: ['px', '%', 'em', 'rem', 'vw', 'vh'],
      },
      typography: {
        customFontSize: false,
      },
    })
    .enable();
};
