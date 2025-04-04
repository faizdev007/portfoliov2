export default class getdatalist{
    constructor(url,search=null){
        this.url = url;
        this.search = search;
    }

    async skillsdata() {
        let rooturl = window.location.origin;
        let response = await fetch(`${rooturl}/api/v1/${this.url}`);
        if(!response.ok){
            throw new Error(`HTTP error! Status: ${response.status}`);
        }
        return response.json();
    }
}