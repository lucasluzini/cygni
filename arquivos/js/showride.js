function toggleID(IDS) {
  var sel = document.getElementById('nav').getElementsByTagName('ul');
  for (var i=0; i<sel.length; i++) { 
    if (sel[i].id != IDS) { sel[i].style.display = 'none'; }
  }
  sel = document.getElementById(IDS);
  sel.style.display = (sel.style.display != 'block') ? 'block' : 'none';
}