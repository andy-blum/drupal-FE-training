((Drupal, once) => {
  Drupal.behaviors.foomami_color = {
    attach: (context, settings) => {
      const colorFields = once(
        'foomami-color-picker',
        '[data-drupal-selector="foomami-color-picker"]'
      );

      colorFields.forEach(field => {
        // get the <input type="text"> element
        const textInput = field.querySelector('input[type="text"]');

        // create a new <input type="color"> element
        const colorInput = document.createElement('input');
        colorInput.type = 'color';

        // Add Drupal's form-element classes
        colorInput.classList.add(
          'form-element',
          'form-element--type-color',
        );

        // Set default value
        colorInput.value = textInput.value;

        // Add element to DOM
        textInput.after(colorInput);

        // Watch each input for changes, keep inputs synced
        textInput.addEventListener('input', () => {
          colorInput.value = textInput.value;
        });

        colorInput.addEventListener('input', () => {
          textInput.value = colorInput.value;
        });
      });
    },
  }
})(window.Drupal, window.once);
