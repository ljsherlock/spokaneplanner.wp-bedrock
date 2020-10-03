import React from 'react'

export default ( {children} ) => {

  return (
    <div className="col-lg-10 col-lg-offset-1">

      <div className="flex img-text-right vh-75-xl pt4 pb4">

        <div 
          className="col-xs-12 col-md-6 col-lg-6 flex flex-column justify-center ph4 text-reveal tr-ns" 
          id="servicesContentCopy1"
        >

          {children[0]}  

        </div>

        <div className="col-xs-12 col-md-6 col-lg-6 ph4 relative z-2 dn db-l">
        
          {children[1]}  

        </div>

      </div>

    </div>
  )
}