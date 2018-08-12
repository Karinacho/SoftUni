let receipt = (() => {

    function getActiveReceipt() {
        let userId=sessionStorage.getItem('userId')

        const endpoint = `receipts?query={"_acl.creator":"${userId}","active":"true"}`;
        return remote.get('appdata', endpoint, 'kinvey');
    }

    function getEntriesByReceiptId(receiptId){
        let endpoint=`entries?query={"receiptId":"${receiptId}"}`
        return remote.get('appdata', endpoint, 'kinvey');

    }

     function createReceipt(total,productCount,active) {
        let data = {total,productCount,active};
       return remote.post('appdata', 'receipts', 'kinvey', data);
    }
    function addEntry(receiptId,price,qty,type){
        let data={receiptId,price,qty,type};
        return remote.post('appdata', 'entries', 'kinvey', data);
    }

    function deleteEntry(entryId) {
        const endpoint = `entries/${entryId}`;
        return remote.remove('appdata', endpoint, 'kinvey');
    }


    function commitReceipt (receiptId,total,productCount,active) {
        const endpoint = `receipts/${receiptId}`;
        let data = { total,productCount,active };
        return remote.update('appdata', endpoint, 'kinvey', data);
    }



    function getMyReceipts() {
        let userId = sessionStorage.getItem('userId');
        const endpoint = `receipts?query={"_acl.creator":"${userId}","active":"false"}`;
        return remote.get('appdata', endpoint, 'kinvey');
    }


    function receiptDetails(receiptId) {
        const endpoint = `receipts/${receiptId}`;
        return remote.get('appdata', endpoint, 'kinvey');
    }

    return {
        getActiveReceipt,
        getEntriesByReceiptId,
        createReceipt,
        addEntry,
        deleteEntry,
        commitReceipt,
        getMyReceipts,
        receiptDetails

    }
})();