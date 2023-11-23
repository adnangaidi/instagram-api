
import {LegacyCard,Button,AppProvider,Page,} from '@shopify/polaris';

import axios from 'axios';
import { endpoint } from '../constant/endpoint';
export  function Topsfilter() {


 
  const handleUpload = async (reel) => {
    try {
      const response = await axios.post(`http://127.0.0.1:8000/api/store`, {
        title: reel.title,        // Replace with the actual property names in your `reel` object
        description: reel.description,  // Replace with the actual property names in your `reel` object
        mudias_url: reel.mudias_url,  // Replace with the actual property names in your `reel` object
      });

      console.log(response.data.message); // Log the response from the server

      // Optionally, update your component state or perform other actions
    } catch (error) {
      console.log('Error uploading video:',error);
    }
  };
  
  

  const Grid=()=>{
    const reels=[
      {id:'1',mudias_url:'https:\/\/media.ccmbg.com\/vc\/1613496843\/5762802457\/316019.mp4',title:'video1',description:'test upload video to our databse'},
      
      {id:'4',mudias_url:'https://v16-webapp-prime.tiktok.com/video/tos/useast2a/tos-useast2a-ve-0068c004/4e66020f8c6f4c37a1a13eb69e2e5ed8/?a=1988&ch=0&cr=3&dr=0&lr=unwatermarked&cd=0%7C0%7C0%7C3&cv=1&br=404&bt=202&bti=NDU3ZjAwOg%3D%3D&cs=0&ds=6&ft=_RwJrBXPq8ZmohboxQ_vjN-R3AhLrus&mime_type=video_mp4&qs=0&rc=OjM2MzU3PDRoZTk1NzVoNUBpajl5cDs6ZmxuZDMzNzczM0A0YzViXzBfXmExNC9jNjAvYSNqZm5icjQwYmtgLS1kMTZzcw%3D%3D&btag=e00090000&expire=1700821932&l=2023112210303847985893B7500714EEE1&ply_type=2&policy=2&signature=7e599d8c71e4c85b9ba6ab62a9e0a82a&tk=tt_chain_token',title:'vidoe4',description:'test upload video to our databse'},

    ]
    return(
      <div className='gridContainerStyle' >
        {
          reels.map((reel)=>(
            <div className='gridItemStyle' key={reel.id}>
            <video className='vieostyle'  controls>
              <source src={reel.mudias_url} type="video/mp4" />
            </video>
            <Button primary className="gridButtonStyle" onClick={()=>handleUpload(reel)}>
        upload
      </Button>
    </div>
          ))
        } 
     
    </div>
    )
  };
  return (
    <AppProvider>
    <Page>
    
        <LegacyCard >
         
          <Grid/>
        
        
        </LegacyCard>
      

    </Page>
    </AppProvider>
  );
}