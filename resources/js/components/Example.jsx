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

    React.useEffect(() => {
        setBoolean(true)
        axios({
            method: "GET",
            url: "http://www.plantapalermo.it/menu2/public/api/categories",
         }).then(( { data }) => {
            setMainMenu(data);
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
    const { products } = menuItem;

    return (
        <Accordion key={menuItem.id} className='pt-2' sx={{ backgroundColor: '#C5E0B4'}}>
        <AccordionSummary
            expandIcon={<ExpandMoreIcon />}
            aria-controls="panel1a-content"
            id="panel1a-header"
        >
            <Typography className='fs-3'>{menuItem.name_category}</Typography>
        </AccordionSummary>
        <AccordionDetails>
        <article className="menu-item">
            <div className='d-flex justify-content-between'>
                <div>Nome</div>
                <div>Prezzo</div>
            </div>
            {/* <img src={img} alt={title} className="photo" /> */}
            <div className="item-info w-100">
                <header className='w-100'>
                    {products?.map((product, i) => {
                    return(
                    <>
                        <div key={i + 1} className='d-flex justify-content-between align-items-center h-100 pt-3'>
                            <h2 className='fw-bold fs-5'>{product.name}</h2>
                            <div>
                            {!product.price_bottle &&
                                <h4 className="price">
                                        €{product.price}
                                </h4>
                            }
                            </div>
                        </div>
                        
                        <p className="pt-2">{product.description}</p>
                        {product.price_bottle &&
                            <div className='d-flex justify-content-between align-items-center'>
                                {product.price_goblet &&
                                    <h2 className='pt-3'>Prezzo calice: €{product.price_goblet}</h2>
                                }
                                <div>
                                    <h4 className="price">Prezzo bottiglia: €{product.price_bottle}</h4>
                                </div>
                            </div>
                        }

                        {product.quantity_cl &&
                                <h4 className="price mt-2">
                                        Quantità: {product.quantity_cl} CL
                                </h4>
                        }

                        {product.quantity_lt &&
                                <h4 className="price mt-2">
                                        Quantità: {product.quantity_lt} LT
                                </h4>
                        }
                    </>
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
