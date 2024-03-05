const root = document.documentElement;
const latView = document.getElementById('amb_lat_view');
const lonView = document.getElementById('amb_lon_view');
var addressView = document.getElementById('amb_address_view');

console.log(addressView);
// ================== Geocoding using Lat & Lon =========================

api_key = "ee2dfca941774c139225977bbddebb90";

function onSuccess(position)
{
    let {latitude,longitude} = position.coords;
    console.log(latitude,longitude);
    latView.value = latitude;
    lonView.value = longitude;
    let loc_txt = "";
    document.cookie = "cur_lat= "+latitude;
    document.cookie = "cur_lon= "+longitude;
    
    // window.location.reload = "/Minor Project 5th_Sem/Emergency_Medical_Support_System/HomePage/signup.php?lat="+latitude+"&lon="+longitude;
    fetch('https://api.opencagedata.com/geocode/v1/json?q='+latitude+','+longitude+'&key='+api_key)
    .then(response=>(response.json())).then(result=>{
        let details = result.results[0];
        loc_txt = details['formatted'];
        document.cookie = "cur_addrss= "+loc_txt;
        console.log(loc_txt);
        addressView.value = loc_txt;
    })
}

function onError(error)
{
    console.log(error);
}

if(navigator.geolocation)
{
    navigator.geolocation.getCurrentPosition(onSuccess,onError);
}
else
{
    btn_loc.innerText = "Geoloaction not supported";
}
