/*
    MODSkinService - make it easy to integrate MOD within an [i]frame
*/

( function() {
    'use strict';

    var
        _baseURL = "www.myorderdesk.com", //LIVE
        //_baseURL = "www.dev.myorderdesk.com", //DEVEL
		_QS = null,
		_locationID = null,
		_providerID = null,
		_userID = null,
		_jobID = null,
		_groupID = null,
		_itemID = null,
		_orderformID = null,
		_processTag = null,
		_browse = null,
		_catalogID = null,
        params = new Object();


    function GetTargetURL() {

        var url, urlArgs;
        switch (_locationID) {
            case 'J':
                if (_providerID > 0) urlArgs = "Provider_ID=" + _providerID;
                if (_jobID > 0) urlArgs += (urlArgs) ? "&Job_ID=" + _jobID : "Job_ID=" + _jobID;
                url = '//' + _baseURL + '/JobDetailsOrder.asp?' + urlArgs;
                break;
            case 'JA':
                if (_providerID > 0) urlArgs = "Provider_ID=" + _providerID;
                if (_jobID > 0) urlArgs += (urlArgs) ? "&Job_ID=" + _jobID : "Job_ID=" + _jobID;
                url = '//' + _baseURL + '/JobDetailsApprover.asp?' + urlArgs;
                break;
            case 'JF':
                if (_providerID > 0) urlArgs = "Provider_ID=" + _providerID;
                if (_jobID > 0) urlArgs += (urlArgs) ? "&Job_ID=" + _jobID : "Job_ID=" + _jobID;
                url = '//' + _baseURL + '/JobDetailsDownload.asp?' + urlArgs;
                break;
            case 'JC':
                if (_providerID > 0) urlArgs = "Provider_ID=" + _providerID;
                if (_jobID > 0) urlArgs += (urlArgs) ? "&Job_ID=" + _jobID : "Job_ID=" + _jobID;
                url = '//' + _baseURL + '/JobDetailsContacts.asp?' + urlArgs;
                break;
            case 'JH':
                if (_providerID > 0) urlArgs = "Provider_ID=" + _providerID;
                if (_jobID > 0) urlArgs += (urlArgs) ? "&Job_ID=" + _jobID : "Job_ID=" + _jobID;
                url = '//' + _baseURL + '/JobDetailsDiary.asp?' + urlArgs;
                break;
            case 'JP':
                if (_providerID > 0) urlArgs = "Provider_ID=" + _providerID;
                if (_jobID > 0) urlArgs += (urlArgs) ? "&Job_ID=" + _jobID : "Job_ID=" + _jobID;
                url = '//' + _baseURL + '/JobDetailsProof.asp?' + urlArgs;
                break;
            case 'R':
                if (_providerID > 0) urlArgs = "&Provider_ID=" + _providerID;
                url = '//' + _baseURL + '/Jobs.asp?1=1' + urlArgs;
                break;
            case 'T':
                if (_providerID > 0) urlArgs = "&Provider_ID=" + _providerID;
                url = '//' + _baseURL + '/Jobs.asp?1=1' + urlArgs;
                break;
            case 'S':
                if (_providerID > 0) urlArgs = "Provider_ID=" + _providerID;
                url = '//' + _baseURL + '/Settings.asp?' + urlArgs;
                break;
            case 'P':
                if (_providerID > 0) urlArgs = "Provider_ID=" + _providerID;
                url = '//' + _baseURL + '/MyPackage.asp?' + urlArgs;
                break;
            case 'I':
                if (_providerID > 0) urlArgs = "Provider_ID=" + _providerID;
                url = '//' + _baseURL + '/BillingInfo.asp?' + urlArgs;
                break;
            case 'B':
                /*
                if (_providerID > 0) urlArgs = "Provider_ID=" + _providerID;
                if (_groupID > 0) urlArgs += (urlArgs) ? "&GroupID=" + _groupID : "GroupID=" + _groupID; //NEW
                if (_orderformID > 0) urlArgs += (urlArgs) ? "&OrderFormID=" + _orderformID : "OrderFormID=" + _orderformID;
                if (_processTag) urlArgs += (urlArgs) ? "&ProcessTag=" + _processTag : "ProcessTag=" + _processTag;
                if (_browse) urlArgs += (urlArgs) ? "&Browse=" + _browse : "Browse=" + _browse;
                */
                urlArgs = '';
                if (_providerID > 0 && !("Provider_ID" in params)) urlArgs += "Provider_ID=" + _providerID;
                if (_groupID > 0 && !("GroupID" in params)) urlArgs += (urlArgs) ? "&GroupID=" + _groupID : "GroupID=" + _groupID; //NEW
                if (_orderformID > 0 && !("OrderFormID" in params)) urlArgs += (urlArgs) ? "&OrderFormID=" + _orderformID : "OrderFormID=" + _orderformID;
                if (_processTag && !("ProcessTag" in params)) urlArgs += (urlArgs) ? "&ProcessTag=" + _processTag : "ProcessTag=" + _processTag;
                if (_browse && !("Browse" in params)) urlArgs += (urlArgs) ? "&Browse=" + _browse : "Browse=" + _browse;                

                urlArgs += (urlArgs) ? "&" + _QS : _QS; //NEW: include QS vars
                url = '//' + _baseURL + '/JobSubmit.asp?' + urlArgs;
                console.log('url ' + url);
                break;
            case 'BC':
                if (_providerID > 0) urlArgs = "Provider_ID=" + _providerID;
                if (_groupID > 0) urlArgs += (urlArgs) ? "&GroupID=" + _groupID : "GroupID=" + _groupID; //NEW
                if (_catalogID > 0) urlArgs += (urlArgs) ? "&CatalogID=" + _catalogID : "CatalogID=" + _catalogID;
                if (_processTag) urlArgs += (urlArgs) ? "&ProcessTag=" + _processTag : "ProcessTag=" + _processTag;
                if (_browse) urlArgs += (urlArgs) ? "&Browse=" + _browse : "Browse=" + _browse;
                url = '//' + _baseURL + '/Catalog/?' + urlArgs;
                break;
            case 'BR':
                if (_providerID > 0) urlArgs = "Provider_ID=" + _providerID;
                if (_jobID > 0) urlArgs += (urlArgs) ? "&Job_ID=" + _jobID : "Job_ID=" + _jobID;
                url = '//' + _baseURL + '/JobFilesReceived.asp?' + urlArgs;
                break;
            case 'U':
                if (_providerID > 0) urlArgs = "Provider_ID=" + _providerID;
                if (_userID > 0) urlArgs += (urlArgs) ? "&User=" + _userID : "User=" + _userID;
                url = '//' + _baseURL + '/VIPZonesUser.asp?' + urlArgs;
                break;
            case 'UP':
                if (_providerID > 0) urlArgs = "Provider_ID=" + _providerID;
                if (_userID > 0) urlArgs += (urlArgs) ? "&User=" + _userID : "User=" + _userID;
                urlArgs += (urlArgs) ? "&" + this._QS : this._QS;
                url = 'http://' + _baseURL + '/VIPZonesProfile.asp?' + urlArgs;
                break;                
            case 'C':
                if (_providerID > 0) urlArgs = "Provider_ID=" + _providerID;
                url = '//' + _baseURL + '/Charges.asp?' + urlArgs;
                break;
            case 'W':
                if (_providerID > 0) urlArgs = "Provider_ID=" + _providerID;
                url = '//' + _baseURL + '/HomePage_WebLink.asp?' + urlArgs;
                break;
            case 'H':
                if (_providerID > 0) urlArgs = "Provider_ID=" + _providerID;
                url = '//' + _baseURL + '/HomePageAddress.asp?' + urlArgs;
                break;
            case 'F':
                if (_providerID > 0) urlArgs = "Provider_ID=" + _providerID;
                url = '//' + _baseURL + '/SetupOptions.asp?' + urlArgs;
                break;
            case 'L':
                if (_providerID > 0) urlArgs = "Provider_ID=" + _providerID;
                if (_groupID > 0) urlArgs += (urlArgs) ? "&GroupID=" + _groupID : "GroupID=" + _groupID;
                url = '//' + _baseURL + '/SignIn/?' + urlArgs;
                break;
            case 'AL':
                if (_providerID > 0) urlArgs = "Provider_ID=" + _providerID;
                if (_groupID > 0) urlArgs += (urlArgs) ? "&GroupID=" + _groupID : "GroupID=" + _groupID;
                urlArgs += (urlArgs) ? "&" + _QS : _QS;
                url = '//' + _baseURL + '/SignIn/?' + urlArgs;
                break;
            case 'N':
                if (_providerID > 0) urlArgs = "Provider_ID=" + _providerID;
                if (_groupID > 0) urlArgs += (urlArgs) ? "&GroupID=" + _groupID : "GroupID=" + _groupID;
                urlArgs += (urlArgs) ? "&" + _QS : _QS; //WEJ - added to allow pass thru signup
                url = '//' + _baseURL + '/SignUp/?' + urlArgs;
                break;
            case 'Z':
                if (_providerID > 0) urlArgs = "Provider_ID=" + _providerID;
                if (_groupID > 0) urlArgs += (urlArgs) ? "&GroupID=" + _groupID : "GroupID=" + _groupID;
                url = '//' + _baseURL + '/Home.asp?' + urlArgs;
                break;
            case 'O':
                if (_providerID > 0) urlArgs = "Provider_ID=" + _providerID;
                if (_itemID > 0) urlArgs += (urlArgs) ? "&InventoryItemID=" + _itemID : "InventoryItemID=" + _itemID;
                url = '//' + _baseURL + '/DocMart.asp?' + urlArgs;
                break;
            case 'Q':
                if (_providerID > 0) urlArgs = "Provider_ID=" + _providerID;
                //url = '//' + _baseURL + '/Logout.asp?' + urlArgs;
                url = '//' + _baseURL + '/SignOut/?' + urlArgs;
                break;
            case 'RH':
                if (_providerID > 0) urlArgs = "Provider_ID=" + _providerID;
                url = '//' + _baseURL + '/RegisterHelper.asp?framed=1&' + urlArgs;
                break;

            case 'CO':
                url = '//' + _baseURL + '/CartController.asp?' + _QS;
                break;

            case 'CR':
                if (_providerID > 0) urlArgs = "Provider_ID=" + _providerID;
                if (params["CartID"] && params["CartID"] != '') urlArgs += '&CartID=' + params["CartID"];
                if (params["token"] && params["token"] != '') urlArgs += '&token=' + params["token"];
                if (params["payerid"] && params["payerid"] != '') urlArgs += '&payerid=' + params["payerid"];
                if (params["payment"] && params["payment"] != '') urlArgs += '&payment=' + params["payment"];

                url = '//' + _baseURL + '/CheckoutReview.asp?' + urlArgs;
                break;

            case 'CT':
                if (_providerID > 0) urlArgs = "Provider_ID=" + _providerID;
                if (params["CartID"] && params["CartID"] != '') urlArgs += '&CartID=' + params["CartID"];
                if (params["View"] && params["View"] != '') urlArgs += '&View=' + params["View"];
                if (params["CartMessage"] && params["CartMessage"] != '') urlArgs += '&CartMessage=' + params["CartMessage"];
                if (params["token"] && params["token"] != '') urlArgs += '&token=' + params["token"];
                if (params["payerid"] && params["payerid"] != '') urlArgs += '&payerid=' + params["payerid"];

                if (params["ShowTab"] && params["ShowTab"] != '') urlArgs += '&ShowTab=' + params["ShowTab"];
                
                url = '//' + _baseURL + '/Cart.asp?' + urlArgs;
                break;

            case 'CS':
                if (_providerID > 0) urlArgs = "Provider_ID=" + _providerID;
                if (params["token"] && params["token"] != '') urlArgs += '&token=' + params["token"];
                if (params["payerid"] && params["payerid"] != '') urlArgs += '&payerid=' + params["payerid"];

                url = '//' + _baseURL + '/Carts.asp?' + urlArgs;
                break;

            case 'CC':
                if (_providerID > 0) urlArgs = "Provider_ID=" + _providerID;
                if (params["Job_ID"] && params["Job_ID"] != '') urlArgs += '&JobID=' + params["Job_ID"];
                if (params["LedgerEntryID"] && params["LedgerEntryID"] != '') urlArgs += '&LedgerEntryID=' + params["LedgerEntryID"];

                url = '//' + _baseURL + '/CheckoutComplete.asp?' + urlArgs;
                break;

            case 'CA':
                if (_providerID > 0) urlArgs = "Provider_ID=" + _providerID;
                if (params["CartID"] && params["CartID"] != '') urlArgs += '&CartID=' + params["CartID"];

                url = '//' + _baseURL + '/CheckoutAddress.asp?' + urlArgs;
                break;


            case 'PR':
                if (_providerID > 0) urlArgs = "Provider_ID=" + _providerID;
                if (params["Email"] && params["Email"] != '') urlArgs += '&Email=' + params["Email"];
                if (params["ResetPassword"] && params["ResetPassword"] != '') urlArgs += '&ResetPassword=' + params["ResetPassword"];
                if (params["ResellerID"] && params["ResellerID"] != '') urlArgs += '&ResellerID=' + params["ResellerID"];
                if (params["ResellerMemberID"] && params["ResellerMemberID"] != '') urlArgs += '&ResellerMemberID=' + params["ResellerMemberID"];

                url = '//' + _baseURL + '/ForgotPassword.asp?' + urlArgs;
                break;

            case 'BPR':
                if (_providerID > 0) urlArgs = "Provider_ID=" + _providerID;
                if (params["ResetPassword"] && params["ResetPassword"] != '') urlArgs += '&ResetPassword=' + params["ResetPassword"];

                url = '//' + _baseURL + '/ForgotBillingPassword.asp?' + urlArgs;
                break;

            case 'PRF':
                if (_providerID > 0) urlArgs = "Provider_ID=" + _providerID;
                if (params["ProofID"] && params["ProofID"] != '') urlArgs += '&ProofID=' + params["ProofID"];
                if (params["Token"] && params["Token"] != '') urlArgs += '&Token=' + params["Token"];

                url = '//' + _baseURL + '/proofs/?' + urlArgs;
                break;

            case 'URL':                
                url = params["URL"];
                break;
        }
        //console.log(_locationID + ' - ' + url);
        return url;
    }


    function createNativePublicFunction() {

        window.MODSkinService = function MODSkinServiceF(frameId, frameUrl) {

            _QS = location.search.substring(1, location.search.length);
            if (_QS) {
                //var params = new Object();
                _QS = _QS.replace(/\+/g, ' ');
                var args = _QS.split('&'); // parse out name/value pairs separated via &
                for (var i = 0; i < args.length; i++) { // split out each name=value pair
                    var value;
                    var pair = args[i].split('=');
                    var name = unescape(pair[0]);
                    value = (pair.length == 2) ? unescape(pair[1]) : name;
                    params[name] = value;
                }
                _locationID = (params["L"]) ? params["L"] : '';
                _providerID = (params["P"]) ? params["P"] : 0;
                _userID = (params["U"]) ? params["U"] : 0;
                _groupID = (params["G"]) ? params["G"] : 0;
                _jobID = (params["J"]) ? params["J"] : 0;
                _itemID = (params["I"]) ? params["I"] : 0;
                _orderformID = (params["O"]) ? params["O"] : 0;
                _processTag = (params["ProcessTag"]) ? params["ProcessTag"] : '';
                _browse = (params["Browse"]) ? params["Browse"] : '';
                _catalogID = (params["T"]) ? params["T"] : 0;
            }

            var targetUrl = GetTargetURL();
            if (targetUrl) {
                frameUrl = (frameUrl) ? frameUrl + location.search : location.href;

                if (frameUrl != location.href) {
                    location.href = frameUrl;
                }
                else {
                    // Find frame, if none found try first iframe
                    var frame = (frameId && document.getElementById(frameId)) ? document.getElementById(frameId) : document.getElementsByTagName('iframe')[0];

                    // Still no frame found, try looking for frame with largest area
                    if (!frame) {
                        var frames = document.getElementsByTagName('frame');
                        if (frames) {
                            frame = frames[0];
                            for (var i = 1; i < frames.length; i++) {
                                if ((frame.scrollWidth * frame.scrollHeight) < (frames[i].scrollWidth * frames[i].scrollHeight))
                                    frame = frames[i];
                            }
                        }
                    }

                    // Load frame, if found
                    if (frame) {
                        frame.src = targetUrl;
                    }
                    else // No frame found, send directly to MOD
                    {
                        location.href = targetUrl;
                    }
                }
            }

        };
    }


    createNativePublicFunction();

})();