import React, { useEffect, useState } from 'react'
import Hero from './Hero'
import Navbar from './Navbar'
import PokeCard from './PokeCard'
import Footer from './Footer'
import { BsSearch } from 'react-icons/bs'

const Home = () => {
  const [pokemon,setPokemon]=useState([]);
  const [next,setNext]=useState('');
  const [previous,setPrevious]=useState('');
  const fetchData = async () => {
    try {
        const response = await fetch('https://pokeapi.co/api/v2/pokemon');
        const data = await response.json();
        console.log(data);
        // let d=JSON.parse(data);
        // console.log(data.results);
        setPokemon(data.results);
        setNext(data.next);
        console.log(data.next);
    } catch (error) {
        console.error('Error fetching data:', error);
    }
}
const fetchNext= async ()=>
{
  console.log("next next");
  if(next===''){return}
  try {
    const response = await fetch(next);
    const data = await response.json();
    console.log(data);
    // let d=JSON.parse(data);
    console.log(data.results);
    setPokemon(data.results);
    setNext(data.next);
} catch (error) {
    console.error('Error fetching data:', error);
}

}

const fetchPrevious= async ()=>
{
  console.log("prev prev");
  if(previous===''){return}
  try {
    const response = await fetch(previous);
    const data = await response.json();
    console.log(data);
    // let d=JSON.parse(data);
    // console.log(data.results);
    setPokemon(data.results);
    setNext(data.next);
} catch (error) {
    console.error('Error fetching data:', error);
}

}
  useEffect(()=>{
    fetchData()
  },[])
  return (
    <div className='bg-slate-800 '>
        <Navbar/>
        <Hero/>
        <div className='w-full my-5 flex justify-center'>
  <div className="w-1/3 flex items-center"> 
    <input type='text' className='bg-transparent border border-white w-full px-3 py-1 rounded-sm text-gray-500 foucs:border-yellow-400  ' />
    <button className="ml-2 text-start  inline-block my-5 px-4 py-2.5  text-gray-700 rounded-lg  font-bold bg-slate-800 border border-white  hover:text-slate-800 hover:bg-yellow-500 transition-all duration-300  hover:border-white"> 
      <BsSearch/>
    </button>
  </div>
</div>
        <div className='max-w-full mx-auto grid  grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 px-5 gap-10 mt-9 '>
          {pokemon.map(((data,ind)=>{
            return <PokeCard key={ind} name={data.name } />
          }))}

        </div>
        <div className='flex mx-10 justify-between '>
          <button onClick={fetchPrevious} className='text-start inline-block my-5 px-4 py-2 bg-yellow-400 text-black rounded-lg  font-bold hover:bg-yellow-800 hover:text-white transition-all duration-300 '>Previous</button>
          <button onClick={fetchNext} className='text-start inline-block my-5 px-4 py-2 bg-yellow-400 text-black rounded-lg  font-bold hover:bg-yellow-800 hover:text-white transition-all duration-300 '>Next</button>

        </div>
        <div className='my-10'></div>
        <Footer/>
    </div>
  )
}

export default Home