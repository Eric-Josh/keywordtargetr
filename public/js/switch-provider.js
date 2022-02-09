$(function(){
    $('.twit-tags').hide()
    let alphas = 'abcdefghijklmnopqrstuvwxyz1234567890'.split('');
    let keyworder, keysuggester;

    // auto search
    if( $('#provider').val() != null && $('#keyword').val() !='' &&  $('#language').val() != null ){

        let googleApi= `https://suggestqueries.google.com/complete/search?client=firefox&hl=${$('#language').val()}&q`;
        let youtubeApi= `https://clients1.google.com/complete/search?client=youtube&gs_ri=youtube&ds=yt&hjson=t&hl=${$('#language').val()}&q`;
        let amazonApi = `http://completion.amazon.com/search/complete?search-alias=aps&client=amazon-search-ui&mkt=1&q=${$('#keyword').val()}`;
        let twitterApi = `https://twitter.com/i/search/typeahead.json?count=10&filters=true&q=%23${$('#keyword').val()}&result_type=hashtags&src=COMPOSE`;
        let twitterApi2 = `https://twitter.com/i/search/typeahead.json?count=10&filters=true&q=${$('#keyword').val()}&result_type=suggestions&src=COMPOSE`;

        $('#loadModal').modal({backdrop:'static', keyboard:false, show:true})

        if($('#provider').val() == 'Google'){
            goKeywordList(googleApi, alphas, $('#keyword').val())
        }else if($('#provider').val() == 'Youtube'){
            youKeywordList(youtubeApi, alphas, $('#keyword').val())
        }else if($('#provider').val() == 'Amazon'){
            amaKeywordList(amazonApi)
        }else if($('#provider').val() == 'Twitter'){
            twitKeywordList(twitterApi, twitterApi2)
        }
    }

    $('#search').click(function(){
        let provider = $('#provider').val(),
            keyword = $('#keyword').val(),
            lang = $('#language').val();

        $(this).attr('disabled', true)
        $('#loadModal').modal({backdrop:'static', keyboard:false, show:true})

        if(keyword != ''){
            // autocomplete search api providers
            let googleApi= `https://suggestqueries.google.com/complete/search?client=firefox&hl=${lang}&q`;
            let youtubeApi= `https://clients1.google.com/complete/search?client=youtube&gs_ri=youtube&ds=yt&hjson=t&hl=${lang}&q`;
            let amazonApi = `http://completion.amazon.com/search/complete?search-alias=aps&client=amazon-search-ui&mkt=1&q`;
            let twitterApi = `https://twitter.com/i/search/typeahead.json?count=10&filters=true&result_type=hashtags&src=COMPOSE&q`;
            let twitterApi2 = `https://twitter.com/i/search/typeahead.json?count=10&filters=true&result_type=suggestions&src=COMPOSE&q`;

            if(provider == 'Google'){
                goKeywordList(googleApi, alphas, keyword)
            }else if(provider == 'Youtube'){
                youKeywordList(youtubeApi, alphas, keyword)
            }else if(provider == 'Amazon'){
                amaKeywordList(amazonApi, keyword)
            }else if(provider == 'Twitter'){
                twitKeywordList(twitterApi, keyword, twitterApi2)
            }
        }
    })

    async function goKeywordList(googleApi, alphas, keyword){
        let keywordData = [];
        try{
            const response = await axios.get('https://api.allorigins.win/get?url=' + encodeURIComponent(`${googleApi}=${keyword}`));
            // handle success	    
            let content = response.data.contents; 
            let json = JSON.parse(content);
    
            for (let i = 0; i < json[1].length; i++) {
                if(json[1][i] != ''){
                    keywordData.push(json[1][i])
                }
            }
            goMoreKeywordList(googleApi, alphas, keyword, keywordData)
        }
        catch(error) {
            console.log(error)
        }
    }

    async function goMoreKeywordList(googleApi, alphas, keyword, keywordData){
        let keywordDataMore = [];
        for(let i=0; i<alphas.length; i++){
            let url = `${googleApi}=${keyword}+${alphas[i]}`;
            let url2 = `${googleApi}=${alphas[i]}+${keyword}`;
    
            try{
                const res = await axios.get('https://api.allorigins.win/get?url=' + encodeURIComponent(url));
                const res2 = await axios.get('https://api.allorigins.win/get?url=' + encodeURIComponent(url2));
    
                let content = res.data.contents;
                let content2 = res2.data.contents; 
                let json = JSON.parse(content);
                let json2 = JSON.parse(content2);
                $(".display").empty();
    
                for (let i = 0; i < json[1].length; i++) {
                    if(json[1][i] != ''){
                        keywordDataMore.push(json[1][i])
                    }
                }

                for (let i = 0; i < json2[1].length; i++) {
                    if(json2[1][i] != ''){
                        keywordDataMore.push(json2[1][i])
                    }
                }

            }catch(error) {
                console.log(error)
            }
        }
        // merge keywordData and keywordDataMore array
        const merger = keywordData.concat(keywordDataMore);
        generate_data(merger)
    }

    async function youKeywordList(youtubeApi, alphas, keyword){
        let keywordData = [];
    
        try{
            const response = await axios.get('https://api.allorigins.win/get?url=' + encodeURIComponent(`${youtubeApi}=${keyword}`));
            // handle success	    
            let content = response.data.contents; 
            let json = JSON.parse(content); 
            
            for (let i=0; i<json[1].length; i++){
                if (json[1][i][0] != ''){
                    keywordData.push(json[1][i][0]);
                }
            }
            // console.log(keywordData)
            youMoreKeywordList(youtubeApi, alphas, keyword, keywordData)
        }
        catch(error) {
            console.log(error)
        }
    }
    
    async function youMoreKeywordList(youtubeApi, alphas, keyword, keywordData){
        let keywordDataMore = [];
    
        for(let i=0; i<alphas.length; i++){
            let url = `${youtubeApi}=${keyword}+${alphas[i]}`;
            let url2 = `${youtubeApi}=${alphas[i]}+${keyword}`;
    
            try{
                const res = await axios.get('https://api.allorigins.win/get?url=' + encodeURIComponent(url));
                const res2 = await axios.get('https://api.allorigins.win/get?url=' + encodeURIComponent(url2));
    
                let content = res.data.contents;
                let content2 = res2.data.contents; 
                let json = JSON.parse(content);
                let json2 = JSON.parse(content2);
                $(".display").empty();
    
                for (let i=0; i<json[1].length; i++){
                    if (json[1][i][0] != ''){
                        keywordDataMore.push(json[1][i][0]);
                    }
                }

                for (let i=0; i<json2[1].length; i++){
                    if (json2[1][i][0] != ''){
                        keywordDataMore.push(json2[1][i][0]);
                    }
                }
    
            }catch(error) {
                console.log(error)
            }
        }
    
        // merge keywordData and keywordDataMore array
        const merger = keywordData.concat(keywordDataMore);
        generate_data(merger)
    }

    async function amaKeywordList(amazonApi, keyword){
        let keywordData = [];
        try{
            const response = await axios.get('https://api.allorigins.win/get?url=' + encodeURIComponent(`${amazonApi}=${keyword}`));
            // handle success	    
            let content = response.data.contents; 
            let json = JSON.parse(content);
    
            for (let i = 0; i < json[1].length; i++) {
                if(json[1][i] != ''){
                    keywordData.push(json[1][i])
                }
            }
            amaMoreKeywordList(amazonApi, keywordData, keyword)
        }
        catch(error) {
            console.log(error)
        }
    }
    
    async function amaMoreKeywordList(amazonApi, keywordData, keyword){
        let keywordDataMore = [];
    
        for(let i=0; i<alphas.length; i++){
            let url = `${amazonApi}=${keyword}+${alphas[i]}`;
            let url2 = `${amazonApi}=${alphas[i]}+${keyword}`;
    
            try{
                const res = await axios.get('https://api.allorigins.win/get?url=' + encodeURIComponent(url));
                const res2 = await axios.get('https://api.allorigins.win/get?url=' + encodeURIComponent(url2));
    
                let content = res.data.contents;
                let content2 = res2.data.contents;
                let json = JSON.parse(content);
                let json2 = JSON.parse(content2);
    
                for (let i = 0; i < json[1].length; i++) {
                    if(json[1][i] != ''){
                        keywordDataMore.push(json[1][i])
                    }
                }
                for (let i = 0; i < json2[1].length; i++) {
                    if(json2[1][i] != ''){
                        keywordDataMore.push(json2[1][i])
                    }
                }
            }catch(error) {
                console.log(error)
            }
        }
    
        // merge keywordData and keywordDataMore array
        const merger = keywordData.concat(keywordDataMore);
        generate_data(merger)
    }

    async function twitKeywordList(twitterApi, keyword, twitterApi2){
        let keywordTags = [];
        let keywordSuggest = [];
        try{
            const responseTags = await axios.get('https://api.allorigins.win/get?url=' + encodeURIComponent(`${twitterApi}=%23${keyword}`));
            const responseSuggest = await axios.get('https://api.allorigins.win/get?url=' + encodeURIComponent(`${twitterApi2}=${keyword}`));
            // handle success	    
            let contentTags = responseTags.data.contents; 
            let jsonTags = JSON.parse(contentTags);

            let contentSuggest = responseSuggest.data.contents; 
            let jsonSuggest = JSON.parse(contentSuggest);
            
            for (let i = 0; i < jsonTags.topics.length; i++) {
                if(jsonTags.topics[i] != ''){
                    keywordTags.push(jsonTags.topics[i].tokens[0].token)
                }
            }

            for (let i = 0; i < jsonSuggest.topics.length; i++) {
                if(jsonSuggest.topics[i].topic != '' ){
                    if( !jsonSuggest.topics[i].topic.includes(`#`))
                        keywordSuggest.push(jsonSuggest.topics[i].topic)
                }
            }
            
            // generate_twit_data(keywordSuggest, keywordTags)
            twitMoreKeywordList(twitterApi2, keyword, keywordSuggest, keywordTags)
        }
        catch(error) {
            console.log(error)
        }
    }

    async function twitMoreKeywordList(twitterApi2, keyword, keywordSuggest, keywordTags){
        let keywordSuggestMore = [];

        for(let i=0; i<alphas.length; i++){
            let url = `${twitterApi2}=${keyword}+${alphas[i]}`;
            let url2 = `${twitterApi2}=${alphas[i]}+${keyword}`;
            try{
                const responseSuggest = await axios.get('https://api.allorigins.win/get?url=' + encodeURIComponent(`${url}`));
                const responseSuggest2 = await axios.get('https://api.allorigins.win/get?url=' + encodeURIComponent(`${url2}`));
                // handle success	    
                let content = responseSuggest.data.contents; 
                let json = JSON.parse(content);
    
                let content2 = responseSuggest2.data.contents; 
                let json2 = JSON.parse(content2);
    
                for (let i = 0; i < json.topics.length; i++) {
                    if(json.topics[i].topic != '' ){
                        if( !json.topics[i].topic.includes(`#`))
                            keywordSuggestMore.push(json.topics[i].topic)
                    }
                }

                for (let i = 0; i < json2.topics.length; i++) {
                    if(json2.topics[i].topic != '' ){
                        if( !json2.topics[i].topic.includes(`#`))
                            keywordSuggestMore.push(json2.topics[i].topic)
                    }
                }
            }
            catch(error) {
                console.log(error)
            }
        }

        const keywordSuggestmerger = keywordSuggest.concat(keywordSuggestMore);
        generate_twit_data(keywordSuggestmerger, keywordTags)
    }

    function generate_data(merger){
        lang = $('#language').val();
        $('#pagination-container1').pagination({
            dataSource: merger,
            className: 'paginationjs-theme-blue',
            pageSize: 20,
            callback: function(merger, pagination, pageSize) {
                $("#tbody").empty();
                $.each(merger, (index, item) => {
                    keyworder = `
                    <tr>
                        <td>
                            <div class="form-check">
                                <label class="form-check-label">
                                    <input type="checkbox" class="form-check-input single-check"
                                        data-item="${item}"
                                    >
                                </label>
                            </div>
                        </td>
                        <td>${item}</td>
                        <td>
                            <a class="btn btn-outline-primary text-sm shadow-sm keyword-search" role="button" data-keyitem="${item}">
                                <i class="fas fa-search"></i> Keyword
                            </a>
                            <a href="https://www.google.com/search?hl=${lang}&q=${item}" target="_blank" role="button" class="btn btn-sm btn-primary shadow-sm">
                                <i class="fab fa-google fa-md"></i>
                            </a>
                            <a href="https://www.youtube.com/results?hl=${lang}&search_query=${item}" target="_blank" role="button" class="btn btn-sm btn-danger shadow-sm">
                                <i class="fab fa-youtube-square fa-md"></i>
                            </a>
                        </td>
                    </tr>   
                    `;
                    $("#tbody").append(keyworder);
                })
            }
        })
        $('.twit-tags').hide()
        $('#total-arr').html(`<b>1-20</b> of <b>${merger.length}</b>`)
        $('#search').attr('disabled', false)
        $('#loadModal').modal('hide')
    }

    function generate_twit_data(keywordSuggest, merger)
    {
        lang = $('#language').val();
        $('#pagination-container').pagination({
            dataSource: merger,
            className: 'paginationjs-theme-blue',
            pageSize: 20,
            callback: function(merger, pagination, pageSize) {
                $("#tbody2").empty();
                $.each(merger, (index, item) => {
                    keyworder = `
                    <tr>
                        <td>
                            <div class="form-check">
                                <label class="form-check-label">
                                    <input type="checkbox" class="form-check-input single-check"
                                        data-item="${item}"
                                    >
                                </label>
                            </div>
                        </td>
                        <td>${item}</td>
                    </tr>   
                    `;
                    $("#tbody2").append(keyworder);
                })
            }
        })

        $('#pagination-container1').pagination({
            dataSource: keywordSuggest,
            className: 'paginationjs-theme-blue',
            pageSize: 20,
            callback: function(keywordSuggest, pagination, pageSize) {
                $("#tbody").empty();
                $.each(keywordSuggest, (index, item) => {
                    keysuggester = `
                    <tr>
                        <td>
                            <div class="form-check">
                                <label class="form-check-label">
                                    <input type="checkbox" class="form-check-input single-check"
                                        data-item="${item}"
                                    >
                                </label>
                            </div>
                        </td>
                        <td>${item}</td>
                        <td>
                            <a href="#" class="btn btn-outline-primary text-sm shadow-sm keyword-search" role="button" data-keyitem="${item}">
                                <i class="fas fa-search"></i> Keyword
                            </a>
                            <a href="https://www.google.com/search?hl=${lang}&q=${item}" target="_blank" role="button" class="btn btn-sm btn-primary shadow-sm">
                                <i class="fab fa-google fa-md"></i>
                            </a>
                            <a href="https://www.youtube.com/results?hl=${lang}&search_query=${item}" target="_blank" role="button" class="btn btn-sm btn-danger shadow-sm">
                                <i class="fab fa-youtube-square fa-md"></i>
                            </a>
                        </td>
                    </tr>   
                    `;
                    $("#tbody").append(keysuggester);
                })
            }
        })
        $('.twit-tags').show()
        $('#search').attr('disabled', false)
        $('#loadModal').modal('hide')
    }


    // set result keyword as new input keyword
    $('body').on('click','.keyword-search', function(){
        let keyitem = $(this).data('keyitem')
        $('#keyword').val(keyitem)
    })

    // check all
    $('#bulk-check').click(function(){
        if ($(this).prop('checked') == true){
            $('.single-check').prop('checked', true);
        }else{
            $('.single-check').prop('checked', false);
        }
    })

    // single checks
    $('#tbody').change(function(){
        if($('#tbody :checkbox:not(:checked)').length == 0){ 
            // all are checked
            $('#bulk-check').prop('checked', true);
        }else if($('#tbody :checkbox:checked').length > 0){
            // all are unchecked
            $('#bulk-check').prop('checked', false);
        }else if($('#tbody :checkbox:checked').length == 0){
            $('#bulk-check').prop('checked', false);
        }
    })

    //actions
    $('#csv-export').click(function(){
        if($('#tbody :checkbox:checked').length == 0){
            checkSelected()
        }else{
            let selectedKeywords = [];
            $('.single-check:checked').each(function(i){
                selectedKeywords.push($(this).data('item'));
                element = this;
            })

            $.ajax({
                url: '/search/csv-export',
                method: 'get',
                data: {dataExport: selectedKeywords},
                xhrFields: { responseType: 'blob' },
                beforeSend: function(){
                    $('#loadModal').modal({backdrop:'static', keyboard:false, show:true})
                },
                success:function(response){
                    $('#loadModal').modal('hide');
                    var blob = new Blob([response]);
                    var link = document.createElement('a');
                    link.href = window.URL.createObjectURL(blob);
                    const cd = new Date();
                    let d = cd.getDate()+'-'+cd.getMonth()+'-'+cd.getFullYear()+'_'+cd.getHours()+':'+cd.getMinutes()+':'+cd.getSeconds();
                    link.download = "keyword"+d+".csv";
                    link.click();
                },            
                error: function(blob){
                    if(response.responseJSON.message){
                        $('.notice-body').html(response.responseJSON.message);
                        $('#noticeModal').modal({backdrop:'static', keyboard:false, show:true});
                    }
                }
            })
        }
    })

    $('#xls-export').click(function(){
        if($('#tbody :checkbox:checked').length == 0){
            checkSelected()
        }else{
            let selectedKeywords = [];
            $('.single-check:checked').each(function(i){
                selectedKeywords.push($(this).data('item'));
                element = this;
            })
            $.ajax({
                url: '/search/xls-export',
                method: 'get',
                data: {dataExport: selectedKeywords},
                xhrFields: { responseType: 'blob' },
                beforeSend: function(){
                    $('#loadModal').modal({backdrop:'static', keyboard:false, show:true})
                },
                success:function(response){
                    $('#loadModal').modal('hide');
                    var blob = new Blob([response]);
                    var link = document.createElement('a');
                    link.href = window.URL.createObjectURL(blob);
                    const cd = new Date();
                    let d = cd.getDate()+'-'+cd.getMonth()+'-'+cd.getFullYear()+'_'+cd.getHours()+':'+cd.getMinutes()+':'+cd.getSeconds();
                    link.download = "keyword"+d+".xlsx";
                    link.click();
                },            
                error: function(blob){
                    if(response.responseJSON.message){
                        $('.notice-body').html(response.responseJSON.message);
                        $('#noticeModal').modal({backdrop:'static', keyboard:false, show:true});
                    }
                }
            })
        }
    })

    $('#cclipboard').click(function(){
        if($('#tbody :checkbox:checked').length == 0){
            checkSelected()
        }else{
            let selectedKeywords = [];
            keywords = '';
            $('.single-check:checked').each(function(i){
                selectedKeywords.push($(this).data('item'));
                element = this;
            })

            for (var i=0; i<selectedKeywords.length; i++){
                keywords += selectedKeywords[i]+"\n";                   
            }

            let $temp = $("<textarea>");
            $("body").append($temp);
            $temp.val(keywords).select();
            document.execCommand("copy");
            $temp.remove();
            $('.notice-body').html('Keyword(s) copied!');
            $('#noticeModal').modal({backdrop:'static', keyboard:false, show:true});
        }
    })

    $('#save-list').click(function(){
        if($('#tbody :checkbox:checked').length == 0){
            checkSelected()
        }else{
            let selectedKeywords = [];
            $('.single-check:checked').each(function(i){
                selectedKeywords.push($(this).data('item'));
                element = this;
            })
            switcher(null);
            $('#list-error').text('');
            $('#save-content').modal({backdrop:'static', keyboard:false, show:true});
        }
    })

    function checkSelected(){
        $('.notice-body').html('Please select one or more keywords');
        $('#noticeModal').modal({backdrop:'static', keyboard:false, show:true});
    }
    
    // create list menu
    $('.create-list').click(function(){
        let switchKey = $(this).data('createlist');
        $('#list-error').text('');
        switcher(switchKey);
        localStorage.setItem('previousStage', null);
    })

    // select list menu
    $('.select-list').click(function(){
        let switchKey = $(this).data('selectlist');
        switcher(switchKey);
        localStorage.setItem('previousStage', null);
    });

    // create new list name
    $('.create-list-name').click(function(){
        if($('#new-list-name').val() == ''){
            $('#list-error').text('Field is required!');
        }else{
            $('#list-error').text('');
            $.ajax({
                url: '/list/store',
                method: 'get',
                data: {
                    listName: $('.new-list-name').val()
                },
                success:function(response){
                    localStorage.setItem('listName', response.listName);
                    localStorage.setItem('listId', response.listId);
                    switcher(2);
                },            
                error: function(response){
                    $('#list-error').text(response.responseJSON.message);
                }
            });
        }
    })

    // select list dropdown
    $('.select-list-name').change(function(){
        localStorage.setItem('listName', $(this).find(":selected").text());
        localStorage.setItem('listId', $(this).find(":selected").val());
        switcher(2);
    });

    $('.save-list').click(function(){
        var keywordData = [];
        $('.single-check:checked').each(function(i){
            keywordData.push($(this).data('item'));
            element = this;
        });

        // post saved data
        $.ajax({
            url: '/search/list/store',
            method: 'get',
            data: {
                listId: localStorage.getItem('listId'),
                provider: $('#provider').find(":selected").text(),
                keywordData: keywordData,
                langCode: $('#language').val()
            },
            success:function(response){
                $('.save-list').hide();
                $('.notify').html(response.status);
                $('#save-content').modal('hide');
            },
            error: function(response){

            }
        })

    })

    $('.prev-step').click(function(){
        let switchKey = localStorage.getItem('previousStage');
        switcher(switchKey);
    })

    function switcher(switchKey){
        switch (switchKey) {
            case 1.1:
                $('.default-list-view').fadeOut();
                $('.create-list-view').fadeIn().css('padding','0px 10px');
                $('.save-list-view').hide();
                $('.select-list-view').hide();
                $('.prev-step').show();
                $('.next-step').hide();
                break;
            case 1.2:
                $('.default-list-view').hide();
                $('.create-list-view').hide();
                $('.save-list-view').hide();
                $('.select-list-view').fadeIn().css('padding','0px 10px');
                $('.prev-step').show();
                $('.next-step').hide();
                break;
            case 2:
                $('.default-list-view').hide();
                $('.create-list-view').hide();
                $('.save-list-view').fadeIn().css('padding','0px 10px');
                $('.list-header').html('<b>List: '+localStorage.getItem('listName')+'</b>');
                $('.select-list-view').hide();
                $('.prev-step').hide();
                $('.next-step').hide();
                break;
        
            default:
                $('.default-list-view').fadeIn();
                $('.create-list-view').hide();
                $('.select-list-view').hide();
                $('.save-list-view').hide();
                $('.prev-step').hide();
                $('.next-step').hide();
                break;
        }
    }
    

})