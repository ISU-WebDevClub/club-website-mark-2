/**
 * Created by gregory on 9/11/16.
 */
var home = document.getElementById('home_tab');
var about = document.getElementById('about_tab');
var portfolio = document.getElementById('portfolio_tab');
var members = document.getElementById('members_tab');
var resources = document.getElementById('resources_tab');
var contact =document.getElementById('contact_tab');

var home_page = document.getElementById('home_page');
var about_page = document.getElementById('about_page');
var portfolio_page = document.getElementById('portfolio_page');
var members_page = document.getElementById('members_page');
var resources_page = document.getElementById('resources_page');
var contact_page =document.getElementById('contact_page');

home.onclick = function(){
  select_home();
};
about.onclick = function(){
  select_about();
};
portfolio.onclick = function(){
  select_portfolio();
};
members.onclick = function(){
  select_members();
};
resources.onclick = function(){
  select_resources();
};
contact.onclick = function(){
  select_contact();
};

function select_home(){
  remove_selected();
  home.classList.add('selected_tab');
  home_page.classList.add('selected_div');
}

function select_about(){
  remove_selected();
  about.classList.add('selected_tab');
  about_page.classList.add('selected_div');
}

function select_portfolio(){
  remove_selected();
  portfolio.classList.add('selected_tab');
  portfolio_page.classList.add('selected_div');
}

function select_members(){
  remove_selected();
  members.classList.add('selected_tab');
  members_page.classList.add('selected_div');
}

function select_resources(){
  remove_selected();
  resources.classList.add('selected_tab');
  resources_page.classList.add('selected_div');
}

function  select_contact() {
  remove_selected();
  contact.classList.add('selected_tab');
  contact_page.classList.add('selected_div');
}

function remove_selected(){
  var selected = document.getElementsByClassName("selected_tab");
  selected[0].classList.remove('selected_tab');
  var selected_div = document.getElementsByClassName("selected_div");
  selected_div[0].classList.remove('selected_div');
}

