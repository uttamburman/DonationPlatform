<h2>Events</h2>
 
<div class="gen" ng-controller="evtShowCtrl">
<div class="evts">
<div class="card" ng-repeat="evt in data | filter:searchFilter">
<div class="cardimg"><img class="imghd" src="files/images/ev/{{evt.eid}}.jpg"></div>
<div class="cardhead">{{evt.evcat}}</div>
<div class="cardname">{{evt.evname}}</div>
<div class="cardsumm">{{evt.summary}}</div>
<div class="cardadd">{{evt.address}}</div>
				
</div>
</div>

