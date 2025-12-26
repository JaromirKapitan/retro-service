import React from 'react'
import { Button } from '../ui/button'
import { Card } from '../ui/card'
import { Link } from '@inertiajs/react'
import { Badge } from '../ui/badge'

const VehicleCard = () => {
  return (
    <Card className="p-4 flex flex-col gap-2 mb-auto">
      <div className="flex gap-2 w-full justify-between items-center">
        <h1 className="text-2xl">Toto je auto</h1>
        <div className='flex gap-2'>
          <Badge>1992</Badge>
          <Badge>Auto</Badge>
        </div>
      </div>
      <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Tempora magnam nemo aliquid necessitatibus numquam consequuntur ea. Incidunt et in animi perspiciatis, porro ex libero corrupti recusandae nobis, fugit rerum inventore!</p>
      <Button asChild>
        <Link href={'#'}>
          Viac
        </Link>
      </Button>
  </Card>
  )
}

export default VehicleCard