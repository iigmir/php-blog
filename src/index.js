// const request = new Promise( (resolve, reject) =>
// {
//     const req = new XMLHttpRequest();
//     req.open("GET", "https://raw.githubusercontent.com/iigmir/blog-source/master/info-files/categories.json", true);
//     req.send();
//     debugger;
//     return xhr;
//     // req.open("GET", "https://raw.githubusercontent.com/iigmir/blog-source/master/info-files/categories.json", true);
//     // req.onload = () => {
//     //     debugger;
//     //     if (this.status >= 200 && this.status < 400) {
//     //         // Success!
//     //         // let data = JSON.parse(this.response);
//     //         resolve( JSON.parse(this.response) );
//     //     } else {
//     //         reject( this );
//     //     }
//     // };
//     // req.onerror = () => {
//     //     reject( "Error" );
//     // };
//     // req.send();
// });

// request.then( data =>
// {
//     console.log( data );
// });

async function ajax()
{
    const tags = await fetch( "https://raw.githubusercontent.com/iigmir/blog-source/master/info-files/categories.json",{ method: "GET" }).then( response => response.json() );
    const arts = await fetch( "https://raw.githubusercontent.com/iigmir/blog-source/master/info-files/contents.json",{ method: "GET" }).then( response => response.json() );
    return { tags, arts };
}

function main()
{
    const a = ajax();
    a.then( res =>
    {
        let article_dom = document.getElementById("articles");
        let article_contents = res.arts.reverse();
        let article_tags = res.tags;
        let render_dom = ( article_item, tags, article_dom ) =>
        {
            const article_component = document.importNode( document.getElementById("article-component").content, true ).children[0];
            const filtered_tag = tags.filter( item => article_item.category_id.some( id => id === item.id ) );
            let link = article_component.children[0].children[0];
            let desc = article_component.children[0].children[1];
            link.href = "./article/" + article_item.id;
            link.innerText = article_item.title;
            link.title = article_item.title;
            desc.innerText = filtered_tag.map( t => t.tag_name ).join( ", " );
            article_dom.appendChild( article_component );
        };
        article_dom.innerHTML = "";
        article_contents.map( item => render_dom( item, article_tags, article_dom ) );
    });
}

main();

// console.log( document.getElementById("articles").children );