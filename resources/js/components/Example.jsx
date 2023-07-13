import * as React from 'react';
import AppBar from '@mui/material/AppBar';
import Toolbar from '@mui/material/Toolbar';
import Accordion from '@mui/material/Accordion';
import AccordionSummary from '@mui/material/AccordionSummary';
import AccordionDetails from '@mui/material/AccordionDetails';
import Typography from '@mui/material/Typography';
import ExpandMoreIcon from '@mui/icons-material/ExpandMore';
import Container from '@mui/material/Container';
import ReactDOM from 'react-dom/client';
import InstagramIcon from '@mui/icons-material/Instagram';
import FacebookIcon from '@mui/icons-material/Facebook';

function Example() {
    const [mainMenu, setMainMenu] = React.useState([])
    const [boolean, setBoolean] = React.useState(true)
    const [booleanFlag, setBooleanFlag] = React.useState(true)
    const [position, setPosition] = React.useState([]);


    React.useEffect(() => {
        setBoolean(true)
        axios({
            method: "GET",
            url: "http://www.plantapalermo.it/menuplanta/public/api/user_products/1", 
            
         }).then(( { data }) => {
            setMainMenu(data);
            data.sort((a, b) => a.position - b.position);
            setPosition(data);
         }).catch(err => {
            console.log(err)
         });
         setBoolean(false)
    }, [])
    
    return (
        <>
    <AppBar position="static" sx={{ backgroundColor: 'black !important'}}>
        <Container maxWidth="xl">
            <Toolbar disableGutters className='d-flex justify-content-center'>
                <img width="300" height="300" src={"http://www.plantapalermo.it/immagini/logo.png"} alt='logo ristorante'/>
            </Toolbar>
            <div className='d-flex justify-content-center'>
                {booleanFlag ?
                <img width="100" height="100" src={"http://www.plantapalermo.it/immagini/italy.png"} alt='bandiera italiana' onClick={() => setBooleanFlag(false)}/>
                :
                <img width="100" height="150" src={"http://www.plantapalermo.it/immagini/england.png"} alt='bandiera inglese' onClick={() => setBooleanFlag(true)}/>
            }
            </div>
        </Container>
    </AppBar>

    {boolean ?
    <div className='d-flex justify-content-center align-items-center'>
        <div className="spinner-border text-success" role="status">
            <span className="visually-hidden">Loading...</span>
        </div>
    </div>
    :
    <div className="section-center pt-4">
    {mainMenu?.map((menuItem, i) => {
    const { products, user } = menuItem;

    return (
        <Accordion key={menuItem.id} className='pt-2' sx={{ backgroundColor: `${user.style.color_accordion} !important`, color: `${user.style.color_item} !important`}}>
        <AccordionSummary
            expandIcon={<ExpandMoreIcon />}
            aria-controls="panel1a-content"
            id="panel1a-header"
        >
            {booleanFlag ?
            <Typography sx={{ fontSize: `${user.style.font_size_cat}px` }} >{menuItem.name_category}</Typography>
            :
            
            <Typography sx={{ fontSize: `${user.style.font_size_cat}px` }}  >
                {menuItem.name_category_eng !== null ?
                menuItem.name_category_eng :
                menuItem.name_category
                }
            </Typography>
        }
        </AccordionSummary>
        <AccordionDetails>
        <article className="menu-item">
            <div className='d-flex justify-content-between'>
                {/* {booleanFlag ? 
                <>
                    <div>Nome</div>
                    <div>Prezzo</div>
                </>
                :
                <>
                    <div>Name</div>
                    <div>Price</div>
                </>
                } */}
            </div>
            {/* <img src={img} alt={title} className="photo" /> */}
            <div className="item-info w-100">
                <header className='w-100'>
                    {products?.map((product, i) => {
                    return(
                    <div key={i + 1}>
                        <div className='d-flex justify-content-between align-items-center h-100 pt-3'>
                            {booleanFlag ?
                            <h2 style={{ fontSize: `${user.style.font_size}px` }}  className='fw-bold'>{product.name}</h2>
                            :
                            <h2 style={{ fontSize: `${user.style.font_size}px` }}  className='fw-bold'>{
                                product.name_eng !== null ?
                                product.name_eng :
                                product.name
                                }</h2>
                            }
                            <div>
                            {!product.price_bottle &&
                                <h4 style={{ fontSize: `${user.style.font_size}px` }} className="price">
                                        €{product.price}
                                </h4>
                            }
                            </div>
                        </div>
                        
                        {booleanFlag ?
                        <p style={{ fontSize: `${user.style.font_size}px` }} className="pt-2">{product.description}</p>
                        :
                        <p style={{ fontSize: `${user.style.font_size}px` }} className="pt-2">{
                            product.description_eng !== null ?
                            product.description_eng :
                            product.description
                            }</p>
                        }
                        {product.price_bottle &&
                            <div className='d-flex justify-content-between align-items-center'>
                                {product.price_goblet &&
                                    <h2 style={{ fontSize: `${user.style.font_size}px` }} className='pt-3'>Prezzo calice: €{product.price_goblet}</h2>
                                }
                                <div>
                                    <h4 style={{ fontSize: `${user.style.font_size}px` }} className="price">Prezzo bottiglia: €{product.price_bottle}</h4>
                                </div>
                            </div>
                        }

                        {product.quantity_cl &&
                                <h4 style={{ fontSize: `${user.style.font_size}px` }} className="price mt-2">
                                        Quantità: {product.quantity_cl} CL
                                </h4>
                        }

                        {product.quantity_lt &&
                                <h4 style={{ fontSize: `${user.style.font_size}px` }} className="price mt-2">
                                        Quantità: {product.quantity_lt} LT
                                </h4>
                        }
                    </div>
                    )
                    })}
                </header>
            </div>
            </article>
        </AccordionDetails>
        </Accordion>  
    );
    })}

        <div className='d-flex justify-content-around pt-3 pb-3'>
            <a href='https://www.instagram.com/plantapalermo/' target='_black' >
                <InstagramIcon sx={{ color: '#C5E0B4 !important'}} fontSize='large'/>
            </a>
            <a href='https://www.facebook.com/plantapalermo' target='_black' >
                <FacebookIcon sx={{ color: '#C5E0B4 !important'}} fontSize='large'/>
            </a>
        </div>
    </div>
    }

    
</>
    );
}

export default Example;

if (document.getElementById('root')) {
    const Index = ReactDOM.createRoot(document.getElementById("root"));

    Index.render(
        <React.StrictMode>
            <Example/>
        </React.StrictMode>
    )
}
