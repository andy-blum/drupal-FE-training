((Drupal) => {
  Drupal.behaviors.foomami_color = {
    attach: (context, settings) => {
      console.log('ATTACHED');
      console.log(context);
      console.log(settings);
    },
  }
})(window.Drupal);
