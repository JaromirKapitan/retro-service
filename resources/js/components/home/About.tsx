import React from 'react'
import StyledContainer from '../ui/container'

const About = () => {
  return (
    <StyledContainer className='py-8 grid grid-cols-1 md:grid-cols-2 items-center gap-8'>
      <h1 className='text-4xl font-semibold text-center'>O Nas</h1>
      <div>
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Molestias fugiat iure reiciendis! Porro minus perferendis voluptatibus voluptas, deserunt ratione rerum dolor quis distinctio, perspiciatis nobis numquam facilis animi fuga saepe?</p>
      </div>
    </StyledContainer>
  )
}

export default About