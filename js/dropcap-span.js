// Automatically wrap the first letter of designated paragraphs with a span

  $('#dropcap-wrapper p:first-of-type').html(function (i, html)
  {
    return html.replace(/^[^a-zA-Z]*([a-zA-Z])/g, '<span id="dropcap">$1</span>');
  });
