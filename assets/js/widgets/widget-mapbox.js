if (typeof L !== 'undefined') {
	// Provide your access token
	L.mapbox.accessToken = 'pk.eyJ1IjoiY3AtYWxhdGlvbiIsImEiOiJ5WEFkdFBNIn0.l80zPH2UyMstiq5-yX0mqw';
	// Create a map in the div #map
	var map = L.mapbox.map('map', 'cp-alation.lf0hpek5', {
	   zoomControl: false
	}).setView([37.491, -122.225], 15);
	var myLayer = L.mapbox.featureLayer().addTo(map);
	
	var geoJson = [{
	    "type": "Feature",
	    "geometry": {
	        "type": "Point",
	        "coordinates": [-122.231397, 37.486601]
	    },
	    "properties": {
	        title: 'Bliss Coffee',
	        "icon": {
	            "iconUrl": "/wp-content/uploads/2015/03/map_pins-1-05.svg",
	            "iconSize": [31, 41], // size of the icon
	            "iconAnchor": [13, 20], // point of the icon which will correspond to marker's location
	            "className": "dot"
	        }
	    }
	},{
	    "type": "Feature",
	    "geometry": {
	        "type": "Point",
	        "coordinates": [-122.229387, 37.486320]
	    },
	    "properties": {
	        "title": "Quinto Sol",
	        "icon": {
	            "iconUrl": "/wp-content/uploads/2015/03/map_pins-1-03.svg",
	            "iconSize": [31, 41], // size of the icon
	            "iconAnchor": [13, 20], // point of the icon which will correspond to marker's location
	            "popupAnchor": [0, -25], // point from which the popup should open relative to the iconAnchor
	            "className": "dot"
	        }
	    }
	},{
	    "type": "Feature",
	    "geometry": {
	        "type": "Point",
	        "coordinates": [-122.230968, 37.485313]
	    },
	    "properties": {
	        "title": "CalTrain",
	        "icon": {
	            "iconUrl": "/wp-content/uploads/2015/03/map_pins-1-02.svg",
	            "iconSize": [31, 41], // size of the icon
	            "iconAnchor": [13, 20], // point of the icon which will correspond to marker's location
	            "popupAnchor": [0, -25], // point from which the popup should open relative to the iconAnchor
	            "className": "dot"
	        }
	    }
	}, {
	    "type": "Feature",
	    "geometry": {
	        "type": "Point",
	        "coordinates": [-122.22984194755554, 37.490587195554156]
	    },
	    "properties": {
	        "title": "Alation HQ",
	        "icon": {
	            "iconUrl": "/wp-content/uploads/2015/03/map_pins-1-01.svg",
	            "iconSize": [46, 63],
	            "iconAnchor": [23, 31],
	            "popupAnchor": [0, 0]
	        }
	    }
	}, {
	    "type": "Feature",
	    "geometry": {
	        "type": "Point",
	        "coordinates": [-122.22806096076967, 37.49054463138801]
	    },
	    "properties": {
	        "title": "US-101",
	        "icon": {
	            "iconUrl": "/wp-content/uploads/2015/03/map_pins-1-06.svg",
	            "iconSize": [57, 41], // size of the icon
	            "iconAnchor": [27, 20], // point of the icon which will correspond to marker's location
	            "popupAnchor": [0, -25], // point from which the popup should open relative to the iconAnchor
	            "className": "dot"
	        }
	    }
	},  {
	    "type": "Feature",
	    "geometry": {
	        "type": "Point",
	        "coordinates": [-122.236120, 37.491847]
	    },
	    "properties": {
	        "title": "Mezes Park",
	        "icon": {
	            "iconUrl": "/wp-content/uploads/2015/03/map_pins-1-04.svg",
	            "iconSize": [31, 41], // size of the icon
	            "iconAnchor": [13, 20], // point of the icon which will correspond to marker's location
	            "popupAnchor": [0, -25], // point from which the popup should open relative to the iconAnchor
	            "className": "dot"
	        }
	    }
	}];
	
	// Set a custom icon on each marker based on feature properties.
	myLayer.on('layeradd', function(e) {
	    var marker = e.layer,
	        feature = marker.feature;
	    marker.bindPopup('<h3>' + feature.properties.title + '</h3>');
	    marker.setIcon(L.icon(feature.properties.icon));
	});
	
	// Add features to the map.
	myLayer.setGeoJSON(geoJson);
	// Disable drag and zoom handlers.
	map.dragging.disable();
	map.touchZoom.disable();
	map.doubleClickZoom.disable();
	map.scrollWheelZoom.disable();
	
	// Disable tap handler, if present.
	// if (map.tap) map.tap.disable();
}