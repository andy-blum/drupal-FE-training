((Drupal, once) => {
  Drupal.behaviors.foomami_color = {
    attach: (context, settings) => {
      const colorFields = once(
        'foomami-color-picker',
        '[data-drupal-selector="foomami-color-picker"]'
      );

      console.log('ATTACHED!');
      console.log(colorFields);
    },
  }
})(window.Drupal, window.once);
