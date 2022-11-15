((Drupal) => {
  Drupal.behaviors.foomami_color = {
    attach: () => {
      const textInputs = once(
        'foomami-color',
        '[data-drupal-selector="foomami-color-picker"] > input[type="text"]',
      );
    },
  };
})(Drupal)
