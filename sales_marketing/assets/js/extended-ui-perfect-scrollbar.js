/**
 * Perfect Scrollbar
 */
'use strict';

document.addEventListener('DOMContentLoaded', function () {
  (function () {
    const verticalExample = document.getElementById('vertical-example'),
      verticalExample2 = document.getElementById('vertical-example2'),
      verticalExample3 = document.getElementById('vertical-example3'),
      verticalExample4 = document.getElementById('vertical-example4'),
      verticalExample5= document.getElementById('vertical-example5'),
      horizontalExample = document.getElementById('horizontal-example'),
      horizVertExample = document.getElementById('both-scrollbars-example');

    // Vertical Example
    // --------------------------------------------------------------------
    if (verticalExample) {
      new PerfectScrollbar(verticalExample, {
        wheelPropagation: false
      });
    }

    // Vertical Example2
    // --------------------------------------------------------------------
    if (verticalExample2) {
      new PerfectScrollbar(verticalExample2, {
        wheelPropagation: false
      });
    }

     // Vertical Example2
    // --------------------------------------------------------------------
    if (verticalExample3) {
      new PerfectScrollbar(verticalExample3, {
        wheelPropagation: false
      });
    }

     // Vertical Example2
    // --------------------------------------------------------------------
    if (verticalExample4) {
      new PerfectScrollbar(verticalExample4, {
        wheelPropagation: false
      });
    }

     // Vertical Example2
    // --------------------------------------------------------------------
    if (verticalExample5) {
      new PerfectScrollbar(verticalExample5, {
        wheelPropagation: false
      });
    }

    // Horizontal Example
    // --------------------------------------------------------------------
    if (horizontalExample) {
      new PerfectScrollbar(horizontalExample, {
        wheelPropagation: false,
        suppressScrollY: true
      });
    }

    // Both vertical and Horizontal Example
    // --------------------------------------------------------------------
    if (horizVertExample) {
      new PerfectScrollbar(horizVertExample, {
        wheelPropagation: false
      });
    }
  })();
});
