'use strict';

(function($)
{
  $.fn.easy_number_animate = function(_options)
  {
    var defaults = {
          start_value    : 0
          ,end_value     : 100
          ,duration      : 1000  // Milliseconds
          ,delimiter     : ','
          ,round         : true
          ,before        : null
          ,after         : null
        }

        ,options = $.extend(defaults, _options)

        ,UPDATES_PER_SECOND     = 60
        ,ONE_SECOND             = 1000  // Milliseconds
        ,MILLISECONDS_PER_FRAME = ONE_SECOND / UPDATES_PER_SECOND
        ,DIRECTIONS             = {DOWN: 0, UP:1}
        ,ONE_THOUSAND           = 1000

        ,$element        = $(this)
        ,interval        = Math.ceil(options.duration / MILLISECONDS_PER_FRAME)
        ,current_value   = options.start_value
        ,increment_value = (options.end_value - options.start_value) / interval
        ,direction       = options.start_value < options.end_value ? DIRECTIONS.UP : DIRECTIONS.DOWN
        ;

    function format_thousand(_value)
    {
      var _THOUSAND_GROUP_LENGTH = 3
          ,_number_string        = _value.toString();

      if(_number_string.length > _THOUSAND_GROUP_LENGTH)
      {
        var _remainder                = _number_string.length % _THOUSAND_GROUP_LENGTH
            ,_index                   = _remainder ? _remainder : _THOUSAND_GROUP_LENGTH
            ,_number_string_formatted = _number_string.slice(0, _index)
            ;

        for(;_index < _number_string.length; _index += _THOUSAND_GROUP_LENGTH)
        {
          _number_string_formatted += options.delimiter + _number_string.slice(_index, _index + _THOUSAND_GROUP_LENGTH);
        }

        return _number_string_formatted;
      } else
      {
        return _value;
      }
    }

    function needs_formatting(_value)
    {
      return _value >= ONE_THOUSAND;
    }

    function animate()
    {
      if(current_value !== options.end_value)
      {
        var new_value = current_value + increment_value;

        if(direction === DIRECTIONS.UP)
        {
          current_value = new_value > options.end_value ? options.end_value : new_value;
        } else
        {
          current_value = new_value < options.end_value ? options.end_value : new_value;
        }

        if(options.round)
        {
          new_value = Math.round(current_value);
        }

        if(options.delimiter && needs_formatting(new_value))
        {
          new_value = format_thousand(new_value);
        }

        $element.text(new_value);
        requestAnimationFrame(animate);
      } else
      {
        if(typeof options.after === 'function')
        {
          options.after($element, current_value);
        }
      }
    }

    if(typeof options.before === 'function')
    {
      options.before($element);
    }

    animate();
  };
}(jQuery));

