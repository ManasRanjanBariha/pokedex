import React, { useEffect, useState } from 'react'

const PokeCard = ({name,url}) => {
    const [pokeData,setPokeData]=useState({});
    const [isLoading,setIsLoading]=useState(true);
    const [type,setType]=useState('');
    const fetchData=async ()=>{
        fetch(url)
        .then(response => {
            if (!response.ok) {
                throw new Error('Network response was not ok');
            }
            return response.json();
        })
        .then(data => {
            // console.log(data);
            
            setPokeData(data);
            setIsLoading(false);
            setType(data?.types[0]?.type?.name);
            // console.log(data?.types[0]?.type?.name);
        })
        .catch(error => {
            console.error('There was a problem with the fetch operation:', error);
        });
    }
    const getTypeBg = (type) => {
        switch (type) {
            case 'flying':
                return "from-purple-400";
            case 'water':
                return "from-blue-400";
            case 'electric':
                return "from-pink-400";
            case 'ice':
                return "from-teal-400";
            case 'fighting':
                return "from-purple-400";
            case 'poison':
                return "from-purple-600";
            case 'ground':
                return "from-yellow-400";
            case 'psychic':
                return "from-red-400";
            case 'bug':
                return "from-lime-400";
            case 'rock':
                return "from-yellow-600";
            case 'ghost':
                return "from-indigo-700";
            case 'dragon':
                return "from-indigo-500";
            case 'dark':
                return "from-gray-800";
            case 'steel':
                return "from-gray-400";
            case 'fairy':
                return "from-pink-500";
            case 'grass':
                return "from-green-400";
            case 'fire':
                return "from-red-400";
            default:
                return "from-yellow-500";
        }
    };
    
    
    const getTypeColor=(type)=>{
        // console.log(type);
       
         if(type==='flying')
        {
            return "bg-[#A98FF3]";
        }
        else if(type==='water'){
            return "bg-[#6390F0]";
        }
        else if(type==='electric'){
            return "bg-[#F790F0]";
        }
        else if(type==='Ice'){
            return "bg-[#96D9D6]";
        }
        else if(type==='fighting'){
            return "bg-[#A98FF3]";
        }
        else if(type==='poison'){
            return "bg-[#A33EA1]";
        }
        else if(type==='ground')
        {
            return 'bg-[#E2BF65]';
        }
        else if(type==='psychic')
        {
            return 'bg-[#F95587]';
        }
        else if(type==='bug')
        {
            return 'bg-[#A6B91A]';
        }
        else if(type==='rock')
        {
            return 'bg-[#b6a136]';
        }
        else if(type==='ghost')
        {
            return 'bg-[#735797]';
        }
        else if(type==='dragon'){
        
            return 'bg-[#6f35fc]';
        }
        else if(type==='dark')
        {
            return 'bg-[#705746]';
        }
        else if(type==='steal'){
        
            return 'bg-[#b7b7ce]';
        }
        else if(type==='fairy')
        {
            return 'bg-[#d685ad]';
        }
        else if(type==='grass')
        {
            return "bg-green-400"
        }
        else if(type==='fire')
        {
            return "bg-red-400";
        }
        else{
            return "bg-orange-600";
        }
    }
    useEffect(()=>{
        fetchData()
        // console.log(type+"hel");
    },[])
  return (
    <>
    {isLoading? <div>Loading</div>: <div className={`max-w-sm rounded overflow-hidden shadow-lg capitalize bg-gradient-to-b ${getTypeBg(type)} to-white hover:scale-105 transition-transform duration-300 transform`}>
    <img className="w-full" src={pokeData.sprites.front_default} alt="Sunset in the mountains"/>
    <div className="px-6 py-1   ">
        
      <div className="font-bold mb-2 text-center text-3xl gap-3    ">{name}</div>
      <div className='flex justify-around text-black'>
      {pokeData.types.map((type, index) => (
        <span key={index} className={` py-2 pb-2 px-4 rounded-md font-semibold text-lg shadow-lg ${getTypeColor(type.type.name)}`}>{type.type.name}</span>
      ))}
      </div>
      
        </div>
    <div className="px-6 pt-4 pb-2">
      </div>
  </div>}
    
    
</>

  )
}

export default PokeCard