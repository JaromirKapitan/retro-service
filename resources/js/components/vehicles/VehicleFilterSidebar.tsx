import React from 'react'
import {Input} from '@/components/ui/input'
import {Label} from '@/components/ui/label'
import {Select, SelectContent, SelectItem, SelectTrigger, SelectValue} from '@/components/ui/select'

interface TypeOption {
    value: string
    title: string
}

interface Filter {
    types?: TypeOption[]
    brands?: string[]
    models?: string[]

    [key: string]: any
}

interface Props {
    filter?: Filter | null
}

const VehicleFilterSidebar = ({filter}: Props) => {
    return (
        <section className='flex flex-col gap-4 w-full h-full p-4 bg-primary-foreground rounded-2xl'>
            <h1 className='text-center text-2xl'>Filtre</h1>
            <Label>Typ</Label>
            <Select>
                <SelectTrigger className='w-full'>
                    <SelectValue placeholder='Vyberte typ vozidla'/>
                </SelectTrigger>
                <SelectContent>
                    {filter?.types && filter.types.length > 0 ? (
                        filter.types.map(type => (
                            <SelectItem key={type.value} value={type.value}>
                                {type.title}
                            </SelectItem>
                        ))
                    ) : (
                        <SelectItem value='' disabled>Žádné možnosti</SelectItem>
                    )}
                </SelectContent>
            </Select>
            <Label>Znacka</Label>
            <Select>
                <SelectTrigger className='w-full'>
                    <SelectValue placeholder='Vyberte typ vozidla'/>
                </SelectTrigger>
                <SelectContent>
                    {filter?.brands && filter.brands.length > 0 ? (
                        filter.brands.map(brand => (
                            <SelectItem key={brand} value={brand}>
                                {brand}
                            </SelectItem>
                        ))
                    ) : (
                        <SelectItem value='' disabled>Žádné možnosti</SelectItem>
                    )}
                </SelectContent>
            </Select>
            <Label>Model</Label>
            <Select>
                <SelectTrigger className='w-full'>
                    <SelectValue placeholder='Vyberte typ vozidla'/>
                </SelectTrigger>
                <SelectContent>
                    {filter?.models && filter.models.length > 0 ? (
                        filter.models.map(model => (
                            <SelectItem key={model} value={model}>
                                {model}
                            </SelectItem>
                        ))
                    ) : (
                        <SelectItem value='' disabled>Žádné možnosti</SelectItem>
                    )}
                </SelectContent>
            </Select>
            <Label>Rok</Label>
            <Input type='text'/>
        </section>
    )
}

export default VehicleFilterSidebar
