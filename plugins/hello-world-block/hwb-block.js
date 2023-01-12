(function() {
  var el = wp.element.createElement;
  var registerBlockType = wp.blocks.registerBlockType;
  var PlainText = wp.editor.PlainText;

  registerBlockType( 'hwb/block', {
    title: 'HWB Block',
    category: 'common',

    edit: function ( props ){
      return el(
        PlainText,
        'p',
        { 
          className: 'hwb-block',
          onChange: function(value){
            console.log(value);
          }
        },
        ""
      )
    },

    save: function ( props ){
       return el(
        'span',
        { className: 'hwb-block'},
        ""
      )
    },
  });
})();