let flightService = (() => {

    function getPublishedFlights() {

        const endpoint = `flights?query={"isPublished":"true"}`;
        return remote.get('appdata', endpoint, 'kinvey');
    }

     function createFlight(departureTime,isPublished,image,cost,seats,departure,origin,destination) {
        let data = { departureTime,isPublished,image,cost,seats,departure,origin,destination};
       return remote.post('appdata', 'flights', 'kinvey', data);
    }

function flightDetails(flightId){


    return remote.get('appdata', `flights/${flightId}`, 'kinvey');
}


    function editFlight(flightId,isPublished,image,cost,seats,departure,origin,destination) {
        const endpoint = `flights/${flightId}`;
        let data = { isPublished,image,cost,seats,departure,origin,destination };
        return remote.update('appdata', endpoint, 'kinvey', data);
    }

    function deleteFlight(flightId) {
        const endpoint = `flights/${flightId}`;
        return remote.remove('appdata', endpoint, 'kinvey');
    }

    function getMyFlights() {
        let userId = sessionStorage.getItem('userId');
        const endpoint = `flights?query={"_acl.creator":"${userId}"}`;
        return remote.get('appdata', endpoint, 'kinvey');
    }



    return {
        getPublishedFlights,
        createFlight,
        editFlight,
        deleteFlight,
        getMyFlights,
        flightDetails
    }
})();