import { cn } from '@/lib/utils'
import React from 'react'

const Hero = ({
  children,
  size,
  img
}: {
  children: React.ReactNode,
  size?: 'sm' | 'md' | 'lg',
  img?: string
}) => {
  let sizeClass = 'py-32'

  if (size === 'sm') {
    sizeClass = 'py-16'
  } else if (size === 'lg') {
    sizeClass = 'py-64'
  }

  return (
    <section className='w-full' style={{ background: 'linear-gradient(rgba(0, 0, 0, 0.6) 0%, rgba(0, 0, 0, 0.5) 100%), url("' + img + '")' , backgroundSize: 'cover', backgroundPosition: 'center' }}>
      <div className={ cn('container w-full text-white mx-auto', sizeClass) }>
        { children }
      </div>
    </section>
  )
}

export default Hero
