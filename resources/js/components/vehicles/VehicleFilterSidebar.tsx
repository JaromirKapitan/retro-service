import React from 'react'
import { Input } from '@/components/ui/input'
import { Label } from '@/components/ui/label'
import { Select, SelectContent, SelectItem, SelectTrigger, SelectValue } from '@/components/ui/select'

const VehicleFilterSidebar = () => {
  return (
    <section className='flex flex-col gap-4 w-full h-full p-4 bg-primary-foreground rounded-2xl'>
      <h1 className='text-center text-2xl'>Filtre</h1>
      <Label>Typ</Label>
      <Select>
        <SelectTrigger className='w-full'>
          <SelectValue placeholder='Vyberte typ vozidla' />
        </SelectTrigger>
        <SelectContent>
          <SelectItem value='motorcykl'>Motocykl</SelectItem>
          <SelectItem value='auto'>Auto</SelectItem>
          <SelectItem value='autobus'>Autobus</SelectItem>
        </SelectContent>
      </Select>
      <Label>Znacka</Label>
      <Select>
        <SelectTrigger className='w-full'>
          <SelectValue placeholder='Vyberte typ vozidla' />
        </SelectTrigger>
        <SelectContent>
          <SelectItem value='citroen'>Citroën</SelectItem>
          <SelectItem value='fiat'>Fiat</SelectItem>
          <SelectItem value='jawa'>Jawa</SelectItem>
          <SelectItem value='skoda'>Škoda</SelectItem>
          <SelectItem value='trabant'>Trabant</SelectItem>
        </SelectContent>
      </Select>
      <Label>Model</Label>
      <Select>
        <SelectTrigger className='w-full'>
          <SelectValue placeholder='Vyberte typ vozidla' />
        </SelectTrigger>
        <SelectContent>
          <SelectItem value='motorcykl'>Motocykl</SelectItem>
          <SelectItem value='auto'>Auto</SelectItem>
          <SelectItem value='autobus'>Autobus</SelectItem>
        </SelectContent>
      </Select>
      <Label>Rok</Label>
      <Input type='text' />
    </section>
  )
}

export default VehicleFilterSidebar