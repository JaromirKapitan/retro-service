import { cn } from '@/lib/utils'
import React from 'react'

const Container = ({
  children,
  className
}: { 
  children: React.ReactNode, 
  className?: string
}) => {
  return (
    <section className='w-full'>
      <div className={ cn('container w-full mx-auto', className) }>
        { children }
      </div>
    </section>
  )
}

export default Container