import "./bootstrap";
import "~resources/scss/app.scss";
import * as bootstrap from "bootstrap";
import.meta.glob(["../img/**", "../fonts/**"]);

function setClasses(el) {
    const isScrollable = el.scrollHeight > el.clientHeight;
    
    if (!isScrollable) {
      el.classList.remove('is-bottom-overflowing', 'is-top-overflowing');
      return;
    }
    
    const isScrolledToBottom = el.scrollHeight < el.clientHeight + el.scrollTop + 1;
    const isScrolledToTop = isScrolledToBottom ? false : el.scrollTop === 0;
    el.classList.toggle('is-bottom-overflowing', !isScrolledToBottom);
    el.classList.toggle('is-top-overflowing', !isScrolledToTop);
  }
  
  document.querySelector('#content').addEventListener('scroll', (e) => {
    const el = e.currentTarget;
    setClasses(el);
  });
  
  setClasses(document.querySelector('#content'));