import React from 'react'
import Container from '../ui/container'

const Stats = () => {
  return (
    <Container className='p-4 py-24 md:py-12 flex flex-col gap-8'>
      <h1 className='text-4xl text-center font-semibold'>Statistiky</h1>
      <div className='grid gap-16 lg:gap-8 grid-cols-1 md:grid-cols-2 lg:grid-cols-4'>
        <div className='flex flex-col gap-4 items-center justify-center'>
          <h1 className='text-6xl font-semibold'>24</h1>
          <p className='text-2xl'>Aut</p>
        </div>
        <div className='flex flex-col gap-4 items-center justify-center'>
          <h1 className='text-6xl font-semibold'>13</h1>
          <p>Motoriek</p>
        </div>
        <div className='flex flex-col gap-4 items-center justify-center'>
          <h1 className='text-6xl font-semibold'>2</h1>
          <p>Autobusy</p>
        </div>
        <div className='flex flex-col gap-4 items-center justify-center'>
          <h1 className='text-6xl font-semibold'>2000</h1>
          <p>Minuty</p>
        </div>
      </div>
    </Container>
  )
}

export default Stats