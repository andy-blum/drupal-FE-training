((Drupal) => {
  Drupal.behaviors.foomami_color = {
    attach: () => {
      const textInputs = once(
        'foomami-color',
        '[data-drupal-selector="foomami-color-picker"] > input[type="text"]',
      );

      textInputs.forEach(textInput => {
        // Create color input element
        const colorInput = document.createElement('input');
        colorInput.type = 'color';

        // Add form-element classes to get admin theme styles
        colorInput.classList.add(
          'form-element',
          'form-element--type-color',
        );

        // Set initial value from text element
        colorInput.value = textInput.value;

        // Inject color input into DOM
        textInput.after(colorInput);

        // Watch for changes and keep inputs in sync
        textInput.addEventListener('input', () => {
          colorInput.value = textInput.value;
        })

        colorInput.addEventListener('input', () => {
          textInput.value = colorInput.value;
        })
      })
    },
  };
})(Drupal)
