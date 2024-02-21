var searchBox = document.getElementById('search-box');
var searchInput = document.querySelector('.search__input');
searchBox.addEventListener('click', function(){
    searchBox.classList.add('open');
    searchInput.focus();
});


var commentForm = document.querySelector('.comment-form');
var evaluateBtn = document.querySelector('.evaluate__btn');

evaluateBtn.addEventListener('click', function() {
    commentForm.classList.toggle('active');
})